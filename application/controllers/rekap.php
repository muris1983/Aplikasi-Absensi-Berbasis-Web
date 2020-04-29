<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rekap extends MY_Controller
{

    public $data = array(
        'modul'         => 'rekap',
        'breadcrumb'    => 'Rekap',
        'pesan'         => '',
        'tabel_data'    => '',
        'main_view'     => 'rekap/rekap',
        'form_action'   => 'rekap',
        'form_value'    => '',
        'option_kelas'  => '',
        'link_excel'    => '',
        'link_pdf'      => '',
        'id_semester'   => '', // untuk tampilan Semester: 2(Genap)
        'kelas'         => '', // untuk tampilan Kelas: XI
    );

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Rekap_model', 'rekap', TRUE);
		$this->load->model('Semester_model', 'semester', TRUE);
		$this->load->model('Siswa_model', 'siswa', TRUE);
		$this->load->model('Kelas_model', 'kelas', TRUE);
	}

	public function index()
	{
        // data option kelas untuk dropdown
        $kelas = $this->kelas->cari_semua();

        // data kelas ada
        if($kelas)
        {
            // prepare data option kelas
            foreach($kelas as $row)
            {
                $this->data['option_kelas'][$row->id_kelas] = $row->kelas;
            }

            // if submit
            if ($this->input->post('submit'))
            {
                // kelas yang dipilih agar dropdown tetap terpilih, tidak reset
                $this->data['form_value']['id_kelas'] = $this->input->post('id_kelas');

                // cari id semester yang aktif
                $id_semester = $this->semester->cari_semester_aktif()->id_semester;

                // id kelas
                $id_kelas = $this->input->post('id_kelas');

                // cari rekap
                $rekap = $this->rekap->rekap($id_kelas, $id_semester)->result();
	
                // ada data rekap
                if ($rekap)
                {
                    // kelas untuk ditampilkan; "Kelas: XI"
					$this->data['kelas'] = $this->db->select('kelas')
													->where('id_kelas', $id_kelas)
													->get('kelas')
													->row()->kelas;

					// id_kelas untuk ditampilkan; "Semester: 2 (Genap)"
					$this->data['id_semester'] = $id_semester;
				
					// buat tabel di rekap_model
                    $this->data['tabel_data'] = $this->rekap->buat_tabel($rekap);

                    // link download excel & pdf
                    $this->data['link_excel'] = anchor("rekap/download_excel/$id_kelas/$id_semester",'Download Excel', array('class' => 'excel'));
                    $this->data['link_pdf'] = anchor("rekap/download_pdf/$id_kelas/$id_semester",'Download PDF', array('class' => 'pdf'));

                    $this->load->view('template', $this->data);
                }
                // data kelas ada, tapi tidak ada siswa yang termasuk di kelas yang dipilih
                else
                {
                    $this->data['pesan'] = 'Tidak ada data rekap. Tidak ada siswa yang terdaftar di kelas yang dipilih.';
                    $this->load->view('template', $this->data);
                }
            }
            // if no submit
            else
            {
                $this->load->view('template', $this->data);
            }
        }
        // data kelas tidak ada
        else
        {
            $this->data['option_kelas']['00'] = '-';
            $this->data['pesan'] = 'Data kelas tidak tersedia. Silahkan isi dahulu data kelas.';
            $this->load->view('template', $this->data);
        }
	}

	// download rekap excel
	public function download_excel($id_kelas, $id_semester)
	{
        // load to_excel_helper (untuk membuat laporan dengan format excel)
        $this->load->helper('to_excel');

        // parameter OK
        if(! empty($id_kelas) && ! empty($id_semester))
        {
            // kelas
            $kelas = $this->db->select('kelas')->where('id_kelas', $id_kelas)->get('kelas')->row()->kelas;
			
            $query = $this->rekap->rekap($id_kelas, $id_semester);
			
			$nama_file = 'REKAP_ABSEN_KELAS_' . $kelas . '_SEMESTER_' . $id_semester;
			
            to_excel($query, $nama_file);
        }
        // parameter tidak lengkap
        else
        {
            $this->session->set_flashdata('pesan', 'Proses pembuatan data rekap (Excel) gagal. Parameter tidak lengkap.');
            redirect('rekap');
        }
	}

    public function download_pdf($id_kelas, $id_semester)
    {
        // pastikan error reporting mati, atau file pdf akan corrupt
        error_reporting(0);

        // parameter OK
        if(! empty($id_kelas) && ! empty($id_semester))
        {
            // kelas
            $kelas = $this->db->select('kelas')->where('id_kelas', $id_kelas)->get('kelas')->row()->kelas;

            $parameters=array(
                'paper'=>'A4',
                'orientation'=>'portrait',
            );

            // load library extension class Cezpdf
            // lokasi: ./application/libraries/Pdf.php
            $this->load->library('Pdf', $parameters);

            // pastikan path font benar
            $this->pdf->selectFont(APPPATH.'/third_party/pdf-php/fonts/Helvetica.afm');

            // gambar header, pastikan path gambar benar
            $this->pdf->ezImage(base_url('asset/images/logo.png'), 0, 200, 'none', 'center');

            // judul rekap
            $this->pdf->ezText("Data Rekap Absensi Kelas $kelas Semester $id_semester", 20, array('justification'=> 'centre'));

            // spasi judul dengan tabel
            $this->pdf->ezSetDy(-15);

            // jalankan query
            $query = $this->rekap->rekap($id_kelas, $id_semester);

            // persiapkan data (array) untuk tabel pdf
            $no = 0;
            $i = 0;
            $data_rekap=array();
            foreach ($query->result_array() as $key => $value) {
                // jangan ganti urutan 3 baris ini, atau nomor tidak tampil
                $data_rekap[$key] = $value;
                $data_rekap[$i]['no']= ++$no;
                $i++;
            }

            // header tabel pdf
            $column_header=array(
                'no' => 'No',
                'nis'=>'NIS',
                'nama'=>'Nama',
                'sakit'=>'Sakit',
                'ijin'=>'Ijin',
                'alpha'=>'Alpha',
                'terlambat'=>'Terlambat',
            );

            // buat tabel pdf
            $this->pdf->ezTable($data_rekap, $column_header);

            $nama_file = 'REKAP_ABSEN_KELAS_' . $kelas . '_SEMESTER_' . $id_semester . '.pdf';

            // force download, nama file sesuai dengan $nama_file
            $this->pdf->ezStream(array('Content-Disposition'=>$nama_file));
        }
        // parameter tidak lengkap
        else
        {
            $this->session->set_flashdata('pesan', 'Proses pembuatan data rekap (PDF) gagal. Parameter tidak lengkap.');
            redirect('rekap');
        }
    }
}
/* End of file rekap.php */
/* Location: ./application/controllers/rekap.php */