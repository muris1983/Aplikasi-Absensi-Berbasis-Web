<?php
$form = array(
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
    <!-- tabel data start -->
<div class="table-responsive table--no-card m-b-30">
    <?php if (! empty($tabel_data)) : ?>
        <?php echo $tabel_data; ?>
    <?php endif ?>
</div>
    <!-- tabel data end -->

    <p>
        <?php echo form_submit($form['submit']); ?>
    </p>
<?php echo form_close(); ?>
<!-- form start -->

<?php
/* End of file semester.php */
/* Location: ./application/views/semester/semester.php */
?>