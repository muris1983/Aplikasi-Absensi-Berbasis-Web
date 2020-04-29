<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kelas_model extends CI_Model {

    public $db_tabel = 'kelas';

	public function __construct()
	{
        parent::__construct();
	}

    public function load_form_rules_tambah()
    {
        $form_rules = array(
            array(
                'field' => 'id_kelas',
                'label' => 'Kode Kelas',
                'rules' => "required|numeric|exact_length[2]|is_unique[$this->db_tabel.id_kelas]"
            ),
            array(
                'field' => 'kelas',
                'label' => 'Nama Kelas',
                'rules' => "required|max_length[32]|is_unique[$this->db_tabel.kelas]"
            ),
        );
        return $form_rules;
    }

    public function load_form_rules_edit()
    {
        $form_rules = array(
            array(
                'field' => 'id_kelas',
                'label' => 'Kode Kelas',
                'rules' => "required|numeric|exact_length[2]|callback_is_id_kelas_exist"
            ),
            array(
                'field' => 'kelas',
                'label' => 'Nama Kelas',
                'rules' => "required|max_length[32]|callback_is_kelas_exist"
            ),
        );
        return $form_rules;
    }

    public function validasi_tambah()
    {
        $form = $this->load_form_rules_tambah();
        $this->form_validation->set_rules($form);

        if ($this->form_validation->run())
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function validasi_edit()
    {
        $form = $this->load_form_rules_edit();
        $this->form_validation->set_rules($form);

        if ($this->form_validation->run())
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function cari_semua()
    {
        return $this->db->order_by('id_kelas', 'DESC')
                        ->get($this->db_tabel)
                        ->result();
    }

    public function cari($id_kelas)
    {
        return $this->db->where('id_kelas', $id_kelas)
                        ->limit(1)
                        ->get($this->db_tabel)
                        ->row();
    }

    public function buat_tabel($data)
    {
        $this->load->library('table');

        // buat class zebra di <tr>,untuk warna selang-seling
        $tmpl = array('row_alt_start'  => '<tr class="zebra">');
        $this->table->set_template($tmpl);

        /// heading tabel
        $this->table->set_heading('No', 'Kode Kelas', 'Nama Kelas', 'Aksi');

        $no = 0;
        foreach ($data as $row)
        {
            $this->table->add_row(
                ++$no,
                $row->id_kelas,
                $row->kelas,
                
                anchor('kelas/edit/'.$row->id_kelas,'<i class="zmdi zmdi-edit"></i> Edit',array('class' => 'edit')).' '.
                
                anchor('kelas/hapus/'.$row->id_kelas,'<i class="zmdi zmdi-delete"></i> Hapus',
                       array(
                           'class'=> 'delete',
                           'data-toggle'=>'modal',
                           'data-target'=>'#staticModal'))
            );
        }
        
        echo '<div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
			 data-backdrop="static">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticModalLabel">Konfirmasi Hapus Data</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								Apakah Anda Yakin Akan Menghapus Data Ini?.
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-warning" data-dismiss="modal">Jangan Hapus</button>
                            <a  href="kelas/hapus/'.$row->id_kelas.'" class="btn btn-danger"  >Hapus Data</a>
							
						</div>
					</div>
				</div>
			</div>';
        
        $tabel = $this->table->generate();

        return $tabel;
    }

    public function tambah()
    {
        $kelas = array(
                      'id_kelas' => $this->input->post('id_kelas'),
                      'kelas' => $this->input->post('kelas')
                      );
        $this->db->insert($this->db_tabel, $kelas);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function edit($id_kelas)
    {
        $kelas = array(
            'id_kelas'=>$this->input->post('id_kelas'),
            'kelas'=>$this->input->post('kelas'),
        );

        // update db
        $this->db->where('id_kelas', $id_kelas);
		$this->db->update($this->db_tabel, $kelas);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function hapus($id_kelas)
    {
        $this->db->where('id_kelas', $id_kelas)->delete($this->db_tabel);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}
/* End of file kelas_model.php */
/* Location: ./application/models/kelas_model.php */