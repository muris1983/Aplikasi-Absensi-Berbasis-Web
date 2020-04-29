<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Siswa extends MY_Controller
{
    public $data = array(
                        'modul'         => 'siswa',
                        'breadcrumb'    => 'Siswa',
                        'pesan'         => '',
                        'pagination'    => '',
                        'tabel_data'    => '',
                        'main_view'     => 'siswa/siswa',
                        'form_action'   => '',
                        'form_value'    => '',
                        'option_kelas'  => '',
                         );

    public function __construct()
	{
		parent::__construct();		
		$this->load->model('Siswa_model', 'siswa', TRUE);
		$this->load->model('Kelas_model', 'kelas', TRUE);
	}

    public function index($offset = 0)
	{
        // hapus data temporary proses update
        $this->session->unset_userdata('nis_sekarang', '');

        // cari data siswa
        $siswa = $this->siswa->cari_semua($offset);

        // ada data siswa, tampilkan
        if ($siswa)
        {
            $tabel = $this->siswa->buat_tabel($siswa);
            $this->data['tabel_data'] = $tabel;

            // Paging
            // http://localhost/absensi2014/siswa/halaman/2
            $this->data['pagination'] = $this->siswa->paging(site_url('siswa/halaman'));
        }
        // tidak ada data siswa
        else
        {
            $this->data['pesan'] = 'Tidak ada data siswa.';
        }
        $this->load->view('template', $this->data);
	}

    public function tambah()
    {
        $this->data['breadcrumb']  = 'Siswa > Tambah';
        $this->data['main_view']   = 'siswa/siswa_form';
        $this->data['form_action'] = 'siswa/tambah';

        // option kelas, untuk menu dropdown
        $kelas = $this->kelas->cari_semua();

        // data kelas ada
        if($kelas)
        {
            foreach($kelas as $row)
            {
                $this->data['option_kelas'][$row->id_kelas] = $row->kelas;
            }
        }
        // data kelas tidak ada
        else
        {
            $this->data['option_kelas']['00'] = '-';
            $this->data['pesan'] = '<div class="alert alert-danger" role="alert">Data kelas tidak tersedia. Silahkan isi dahulu data kelas.</div>';
            //$this->load->view('template', $this->data);
        }

        // if submit
        if($this->input->post('submit'))
        {
            // validasi sukses
            if($this->siswa->validasi_tambah())
            {
                if($this->siswa->tambah())
                {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Proses tambah data berhasil.</div>');
                    redirect('siswa');
                }
                else
                {
                    $this->data['pesan'] = '<div class="alert alert-danger" role="alert">Proses tambah data gagal.</div>';
                    $this->load->view('template', $this->data);
                }
            }
            // validasi gagal
            else
            {
                $this->load->view('template', $this->data);
            }
        }
        // if no submit
        else
        {
            $this->load->view('template', $this->data);
        }
    }

    public function edit($nis = NULL)
    {
        $this->data['breadcrumb']  = 'Siswa > Edit';
        $this->data['main_view']   = 'siswa/siswa_form';
        $this->data['form_action'] = 'siswa/edit/' . $nis;

        // option kelas
        $kelas = $this->kelas->cari_semua();
        foreach($kelas as $row)
        {
            $this->data['option_kelas'][$row->id_kelas] = $row->kelas;
        }

        // Mencegah error http://localhost/absensi2014/siswa/edit/$nis (edit tanpa ada parameter)
        // Ada parameter
        if( ! empty($nis))
        {
            // submit
            if($this->input->post('submit'))
            {
                // validasi berhasil
                if($this->siswa->validasi_edit() === TRUE)
                {
                    //update db
                    $this->siswa->edit($this->session->userdata('nis_sekarang'));
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Proses update data berhasil.</div>');

                    redirect('siswa');
                }
                // validasi gagal
                else
                {
                    $this->load->view('template', $this->data);
                }

            }
            // tidak disubmit, form pertama kali dimuat
            else
            {
                // ambil data dari database, $form_value sebagai nilai default form
                $siswa = $this->siswa->cari($nis);
                foreach($siswa as $key => $value)
                {
                    $this->data['form_value'][$key] = $value;
                }

                // set temporary data untuk edit
                $this->session->set_userdata('nis_sekarang', $siswa->nis);

                $this->load->view('template', $this->data);
            }
        }
        // tidak ada parameter $nis di URL, kembalikan ke halaman siswa
        else
        {
            redirect('siswa');
        }
    }

    public function hapus($nis = NULL)
    {
        if( ! empty($nis))
        {
            if($this->siswa->hapus($nis))
            {
                $this->session->set_flashdata('pesan', 'Proses hapus data berhasil.');
                redirect('siswa');
            }
            else
            {
                $this->session->set_flashdata('pesan', 'Proses hapus data gagal.');
                redirect('siswa');
            }
        }
        else
        {
            $this->session->set_flashdata('pesan', 'Proses hapus data gagal.');
            redirect('kelas');
        }
    }

    public function is_nis_exist()
    {
        $nis_sekarang  = $this->session->userdata('nis_sekarang');
        $nis_baru      = $this->input->post('nis');

        if ($nis_baru === $nis_sekarang)
        {
            return TRUE;
        }
        else
        {
            // cek database untuk nis yang sama
            $query = $this->db->get_where('siswa', array('nis' => $nis_baru));
            if($query->num_rows() > 0)
            {
                $this->form_validation->set_message('is_nis_exist',
                                                    "Siswa dengan NIS $nis_baru sudah terdaftar");
                return FALSE;
            }
            else
            {
                return TRUE;
            }
        }
    }

}
/* End of file siswa.php */
/* Location: ./application/controllers/siswa.php */