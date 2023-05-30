<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $this->site_title;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/iCheck/square/blue.css">
  <!-- Alert -->
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/css/alert.css');?>" />
  
  <!-- jQuery 3 -->
  <script src="<?php echo base_url();?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url();?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url();?>assets/admin/plugins/iCheck/icheck.min.js"></script>
  <!-- Alert -->
	<script src="<?php echo base_url('assets/js/alert.js');?>"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/custom.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="background-image: url(<?php echo base_url();?>assets/admin/img/banner.png);">
<?php if($this->session->flashdata('success')):?>
<script>alert_success("<?php echo $this->session->flashdata('success')?>");</script>
<?php endif;?>
<?php if($this->session->flashdata('error')):?>
<script>alert_danger("<?php echo $this->session->flashdata('error')?>");</script>
<?php endif;?>
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url();?>">
    <img src="<?php echo base_url('uploads/settings/').$this->header_logo;?>">
    </a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Enter Your New Passowrd</p>
    <form action="<?php echo base_url('admin/reset-password/').$this->uri->segment(3);?>" method="post">
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="new_password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?php echo form_error('new_password'); ?>
      </div>
       <div class="form-group has-feedback">
        <input type="password" class="form-control" name="cnf_password" placeholder="Confirm Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?php echo form_error('cnf_password'); ?>
      </div>
      <div class="row">
        <div class="col-xs-4 col-xs-offset-8">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
