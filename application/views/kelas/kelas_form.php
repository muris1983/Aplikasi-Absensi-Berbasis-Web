<?php
$form = array(
    'id_kelas' => array(
                        'name'=>'id_kelas',
                        'size'=>'30',
                        'class'=>'form-control',
                        'value'=>set_value('id_kelas', isset($form_value['id_kelas']) ? $form_value['id_kelas'] : '')
                  ),
    'kelas'    => array(
                        'name'=>'kelas',
                        'size'=>'30',
                        'class'=>'form-control',
                        'value'=>set_value('kelas', isset($form_value['kelas']) ? $form_value['kelas'] : '')
                  ),
    'submit'   => array(
                        'name'=>'submit',
                        'class'=>'btn btn-primary',
                        'id'=>'submit',
                        'value'=>'Simpan'
                  )
    );
?>

<h2 class="title-3 m-b-30"><?php echo $breadcrumb ?></h2>

<!-- pesan start -->
<?php $flash_pesan = $this->session->flashdata('pesan')?>

<?php if (! empty($flash_pesan)) : ?>
    <div class="pesan">
        <?php echo $flash_pesan; ?>
    </div>
<?php endif ?>
<!-- pesan end -->

<!-- form start -->
<?php echo form_open($form_action); ?>
	<div class="form-group">
        <?php echo form_label('Kode Kelas', 'id_kelas'); ?>
        <?php echo form_input($form['id_kelas']); ?>
	</div>
	<?php echo form_error('id_kelas', '<p class="text-danger">', '</p>');?>
	
	<div class="form-group">
        <?php echo form_label('Nama Kelas', 'kelas'); ?>
        <?php echo form_input($form['kelas']); ?>
	</div>
	<?php echo form_error('kelas', '<p class="text-danger">', '</p>');?>	

	<div class="form-group">
        <?php echo form_submit($form['submit']); ?>
        <?php echo anchor('kelas','Batal', array('class' => 'btn btn-warning')) ?>
	</div>
<?php echo form_close(); ?>
<!-- form end -->

<?php
/* End of file kelas_form.php */
/* Location: ./application/views/kelas/kelas_form.php */
?>