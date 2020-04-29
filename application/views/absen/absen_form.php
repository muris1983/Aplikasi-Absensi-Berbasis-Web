<?php
$form = array(
    'nis' => array(
        'name'=>'nis',
        'size'=>'30',
        'autocomplete'=>'off',
        'class'=>'form-control',
        'value'=>set_value('nis', isset($form_value['nis']) ? $form_value['nis'] : '')
    ),
    'tanggal'    => array(
        'name'=>'tanggal',
        'size'=>'30',
        'autocomplete'=>'off',
        'class'=>'form-control datepicker',
        'value'=>set_value('tanggal', isset($form_value['tanggal']) ? $form_value['tanggal'] : '')
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
<?php if (! empty($pesan)) : ?>
    <div class="pesan">
        <?php echo $pesan; ?>
    </div>
<?php endif ?>
<!-- pesan end -->

<!-- form start -->
<?php echo form_open($form_action); ?>
<div class="form-group">
    <?php echo form_label('NIS', 'nis'); ?>
    <?php echo form_input($form['nis']); ?>
</div>
<?php echo form_error('nis', '<p class="field_error">', '</p>');?>

<div class="form-group">
    <?php echo form_label('Tanggal (dd-mm-yyyy)', 'tanggal'); ?>
    <?php echo form_input($form['tanggal']); ?>
    
</div>
<?php echo form_error('tanggal', '<p class="field_error">', '</p>');?>

<div class="form-group">
    <?php echo form_label('Absen', 'absen'); ?>
    <?php echo form_radio('absen', 'S', set_radio('absen', 'S',isset($form_value['absen']) && $form_value['absen'] == 'S' ? TRUE : FALSE)); ?> ( Sakit )
    <?php echo form_radio('absen', 'I', set_radio('absen', 'I',isset($form_value['absen']) && $form_value['absen'] == 'I' ? TRUE : FALSE)); ?> ( Ijin )
    <?php echo form_radio('absen', 'A', set_radio('absen', 'A',isset($form_value['absen']) && $form_value['absen'] == 'A' ? TRUE : FALSE)); ?> ( Alpha )
    <?php echo form_radio('absen', 'T', set_radio('absen', 'T',isset($form_value['absen']) && $form_value['absen'] == 'T' ? TRUE : FALSE)); ?> ( Terlambat )
</div>
<?php echo form_error('absen', '<p class="field_error">', '</p>');?>

<div class="form-group">
    <?php echo form_submit($form['submit']); ?>
    <?php echo anchor('absen','Batal', array('class' => 'btn btn-warning')) ?>
</div>
<?php echo form_close(); ?>
<!-- form end -->


