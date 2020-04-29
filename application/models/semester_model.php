<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Semester_model extends CI_Model {

    public $db_tabel = 'semester';

    public function cari_semester_aktif()
    {
        return $this->db->select('id_semester')
                        ->where('status', 'Y')
                        ->limit(1)
                        ->get($this->db_tabel)
                        ->row();
    }

	function cari_semua()
	{
		return $this->db->order_by('id_semester')
		                ->get($this->db_tabel)
                        ->result();
	}

    // buat tabel untuk ditampilkan
    public function buat_tabel($data)
    {
        $this->load->library('table');

        // buat class zebra di <tr>,untuk warna selang-seling
        $tmpl = array('row_alt_start'  => '<tr class="zebra">');
        $this->table->set_template($tmpl);

        // heading tabel
        $this->table->set_heading('Semester', 'Status / Pilih');

        // generate row tabel
        foreach ($data as $row)
        {
            $this->table->add_row(
                $row->id_semester == 1 ? $row->id_semester . ' (Ganjil)' : $row->id_semester . ' (Genap)',
                // form_radio : perhatikan parameter ke-3, TRUE/FALSE akan menentukan status radio
                // checked atau tidak
                form_radio('id_semester', $row->id_semester, ($row->status == 'Y' ? TRUE : FALSE))
            );
        }
        $tabel = $this->table->generate();

        return $tabel;
    }

    // mengaktifkan semester
    public function set()
    {
        $id_semester = $this->input->post('id_semester');

        $sql1 = "UPDATE semester
				 SET semester.status = 'Y'
				 WHERE semester.id_semester = '$id_semester'";

        $sql2 = "UPDATE semester
				 SET semester.status = 'N'
				 WHERE semester.id_semester != '$id_semester'";

        // lakukan update dengan metode transaksi
        // memastikan 2 operasi berjalan semua
        $this->db->trans_start();
        $this->db->query($sql1);
        $this->db->query($sql2);
        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}
/* End of file semester_model.php */
/* Location: ./application/models/semester_model.php */