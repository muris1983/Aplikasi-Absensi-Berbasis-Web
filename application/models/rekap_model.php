<?php

class Rekap_model extends CI_Model {

    public $db_tabel = 'absen';

    // cari data absen di kelas yang dipilih pada semester yang sedang aktif
	public function rekap($id_kelas, $id_semester)
	{
		$sql = "SELECT siswa.nis, siswa.nama,

				/* ----------- jumlah sakit ------------*/
				IFNULL((SELECT COUNT(absen.absen)
				FROM absen
				WHERE absen.absen = 'S'
				AND absen.id_semester = '$id_semester'
				AND absen.nis = siswa.nis
				AND absen.nis IN (SELECT siswa.nis
								  FROM siswa
								  WHERE siswa.id_kelas = '$id_kelas'
								  ORDER BY siswa.nis ASC)
				GROUP BY absen.nis
				ORDER BY absen.nis ASC), 0) AS sakit,

				/* ----------- jumlah ijin ------------*/
				IFNULL((SELECT COUNT(absen.absen)
				FROM absen
				WHERE absen.absen = 'I'
				AND absen.id_semester = '$id_semester'
				AND absen.nis = siswa.nis
				AND absen.nis IN (SELECT siswa.nis
								  FROM siswa
								  WHERE siswa.id_kelas = '$id_kelas'
								  ORDER BY siswa.nis ASC)
				GROUP BY absen.nis
				ORDER BY absen.nis ASC), 0) AS ijin,

				/* ----------- jumlah alpa ------------*/
				IFNULL((SELECT COUNT(absen.absen)
				FROM absen
				WHERE absen.absen = 'A'
				AND absen.id_semester = '$id_semester'
				AND absen.nis = siswa.nis
				AND absen.nis IN (SELECT siswa.nis
								  FROM siswa
								  WHERE siswa.id_kelas = '$id_kelas'
								  ORDER BY siswa.nis ASC)
				GROUP BY absen.nis
				ORDER BY absen.nis ASC), 0) AS alpha,

				/* ----------- jumlah telat ------------*/
				IFNULL((SELECT COUNT(absen.absen)
				FROM absen
				WHERE absen.absen = 'T'
				AND absen.id_semester = '$id_semester'
				AND absen.nis = siswa.nis
				AND absen.nis IN (SELECT siswa.nis
								  FROM siswa
								  WHERE siswa.id_kelas = '$id_kelas'
								  ORDER BY siswa.nis ASC)
				GROUP BY absen.nis
				ORDER BY absen.nis ASC), 0) AS terlambat

			FROM siswa
			WHERE siswa.id_kelas = '$id_kelas'
			GROUP BY siswa.nis
			ORDER BY siswa.nis ASC;";
			
		return $this->db->query($sql);
	}

    public function buat_tabel($rekap)
    {
        $this->load->library('table');

        // Buat class zebra di <tr>,untuk warna selang-seling
        $tmpl = array('row_alt_start'  => '<tr class="zebra">');
        $this->table->set_template($tmpl);

        /// Buat heading tabel
        $this->table->set_heading('No', 'NIS', 'Nama', 'Sakit', 'Ijin', 'Alpha', 'Terlambat');

        $no = 0;
        foreach ($rekap as $row)
        {
            $this->table->add_row(++$no,
                $row->nis,
                $row->nama,
                $row->sakit,
                $row->ijin,
                $row->alpha,
                $row->terlambat);
        }

        $tabel = $this->table->generate();

        return $tabel;
    }
}
/* End of file rekap_model.php */
/* Location: ./application/models/rekap_model.php */