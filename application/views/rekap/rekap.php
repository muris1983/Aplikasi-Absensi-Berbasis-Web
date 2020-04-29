<h2 class="title-3 m-b-30"><?php echo $breadcrumb ?></h2>

<!-- pesan flash message start -->
<?php $flash_pesan = $this->session->flashdata('pesan')?>
<?php if (! empty($flash_pesan)) : ?>
    <div class="pesan">
        <?php echo $flash_pesan; ?>
    </div>
<?php endif ?>
<!-- pesan flash message end -->

<!-- pesan start -->
<?php if (! empty($pesan)) : ?>
    <div class="pesan">
        <?php echo $pesan; ?>
    </div>
<?php endif ?>
<!-- pesan end -->

<!-- form start -->

<?php echo form_open($form_action); ?>
<div class="form-group">
    <?php echo form_label('Kode Kelas', 'id_kelas'); ?>    
    <?php echo form_dropdown('id_kelas', $option_kelas, isset($form_value['id_kelas']) ? $form_value['id_kelas'] : '','class="form-control"'); ?>    
</div>
<?php echo form_error('id_kelas', '<p class="field_error">', '</p>');?>

<div class="form-group">
    <?php // echo form_submit($form['submit']); ?>
    <?php echo form_submit(array('name' => 'submit', 'id'=>'submit', 'class'=>'btn btn-primary','value'=>'Rekap Absen')); ?>
</div>
<?php echo form_close(); ?>
<?php echo form_fieldset_close(); ?>
<!-- form end -->

<!-- kelas start -->
<?php if (! empty($kelas)) : ?>
    <?php echo 'Kelas : <b>' . $kelas . '</b><br />'; ?>
<?php endif ?>
<!-- kelas end -->

<!-- semester start -->
<?php if (! empty($id_semester)) : ?>
    <?php 
        ($id_semester == 1) ? ($id_semester = '<b>1 (Ganjil)</b>') : ($id_semester = '<b>2 (Genap)</b>');
        echo 'Semester : ' . $id_semester . '<br /><br />';
    ?>    
<?php endif ?>
<!-- semester end -->

<!-- tabel data start -->
<div class="table-responsive table--no-card m-b-30">
<?php if (! empty($tabel_data)) : ?>
    <?php echo $tabel_data; ?>    
<?php endif ?>
</div>
<!-- tabel data end -->

<!-- link download rekap start -->
<?php if (! empty($link_excel) && ! empty($link_pdf)) : ?>
<div id="bottom_link">
    <?php echo $link_excel .'&nbsp;&nbsp;&nbsp;' . $link_pdf; ?>
</div>
<?php endif ?>
<!-- link download rekap end -->