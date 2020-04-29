<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="MURIS STUDIO">
    <meta name="author" content="MURIS STUDIO">
    <meta name="keywords" content="MURIS STUDIO">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="<?php echo base_url();?>asset/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>asset/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>asset/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>asset/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo base_url();?>asset/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url();?>asset/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>asset/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>asset/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>asset/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>asset/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>asset/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>asset/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url();?>asset/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">

    
    
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="<?php echo base_url();?>asset/images/icon/logo-absensi.png" alt="Muris Studio">
                            </a>
                        </div>
                        
                        <!-- pesan start -->
    <?php if (! empty($pesan)) : ?>
        <p id="message">
            <?php echo $pesan; ?>
        </p>
    <?php endif ?>
    <!-- pesan end -->
                        
                        <div class="login-form">
                            <?php
		$attributes = array('name' => 'login_form', 'id' => 'login_form','autocomplete' => 'off');
		echo form_open('login', $attributes);
	?>
                                <div class="form-group">
                                    <label for="username">Username:</label>
			                         <input type="text" name="username" size="20" class="au-input au-input--full" value="<?php echo set_value('username');?>">
                                    <br><br>
                                    <?php echo form_error('username', '<p class="alert alert-danger">', '</p>');?>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
			<input type="password" name="password" size="20" class="au-input au-input--full" value="<?php echo set_value('password');?>">
                                    <br><br>
                                  <?php echo form_error('password', '<p class="alert alert-danger">', '</p>');?>  
                                </div>
                                
                            
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                                
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
	
	
	



<script src="<?php echo base_url();?>asset/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo base_url();?>asset/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?php echo base_url();?>asset/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo base_url();?>asset/vendor/slick/slick.min.js">
    </script>
    <script src="<?php echo base_url();?>asset/vendor/wow/wow.min.js"></script>
    <script src="<?php echo base_url();?>asset/vendor/animsition/animsition.min.js"></script>
    <script src="<?php echo base_url();?>asset/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?php echo base_url();?>asset/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url();?>asset/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?php echo base_url();?>asset/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?php echo base_url();?>asset/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo base_url();?>asset/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?php echo base_url();?>asset/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="<?php echo base_url();?>asset/js/main.js"></script>

</body>

</html>
<!-- end document-->