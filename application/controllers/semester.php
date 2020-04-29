<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Semester extends MY_Controller
{
    public $data = array(
        'modul'         => 'semester',
        'breadcrumb'    => 'Semester',
        'pesan'         => '',
        'tabel_data'    => '',
        'main_view'     => 'semester/semester',
        'form_action'   => 'semester',
        'form_value'    => '',
    );

    public function __construct()
	{
		parent::__construct();	
		$this->load->model('Semester_model', 'semester', TRUE);
	}

	public function index()
	{
        // cari semester
        $semester = $this->semester->cari_semua();

        // tampilkan dalam tabel
        if ($semester)
        {
            $tabel = $this->semester->buat_tabel($semester);
            $this->data['tabel_data'] = $tabel;
        }

        // if submit
        if($this->input->post('submit'))
        {
            // proses
            $this->semester->set();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Proses ubah semester berhasil.</div>');
            redirect('semester');
        }
        // if no submit
        else
        {
            // tampilkan
            $this->load->view('template', $this->data);
        }
	}
}
/* End of file semester.php */
/* Location: ./application/controllers/semester.php */