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
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/bower_components/select2/dist/css/select2.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/iCheck/all.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/alert.css');?>" />  
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="<?php echo base_url();?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/admin/js/alert.js');?>"></script>
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
  <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>


  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
  <link rel="stylesheet" id="theme_style" href="<?php echo !empty($_COOKIE['theme'])?$_COOKIE['theme']:base_url().'assets/admin/css/custom.css';?>">
  

    <!--script>
    $(document).ready(function(){
      $('.slider').bxSlider();
      var dark_theme = '<?php echo base_url();?>assets/admin/css/custom.css';
      var light_theme = '<?php echo base_url();?>assets/admin/css/custom-light.css';
      
      var theme = localStorage.getItem("theme");
      
      if(theme != null){
          if(theme == 'dark_theme'){
              $('#theme_style').attr('href', dark_theme);
              $('#theme-switch').prop('checked',true);
          }
          else if(theme == 'light_theme'){
              $('#theme_style').attr('href', light_theme);
              $('#theme-switch').prop('checked',false);
          }
      }
      else{
          $('#theme_style').attr('href',dark_theme);
      }
      
      $('#theme-switch').on('change',function(){
          if($(this).prop('checked')){
              $('#theme_style').attr('href',dark_theme);
              document.cookie = "theme="+dark_theme;
          }
          else{
              $('#theme_style').attr('href',light_theme);
              document.cookie = "theme="+light_theme;
          }
      });
      
    });
    </script-->  
    
    
    <script>
    
    $(document).ready(function(){
        var dark_theme = '<?php echo base_url();?>assets/admin/css/custom.css';
        var light_theme = '<?php echo base_url();?>assets/admin/css/custom-light.css';
        
        $('#theme-switch').on('change',function(){
          if($(this).prop('checked')){
              $('#theme_style').attr('href',dark_theme);
          }
          else{
              $('#theme_style').attr('href',light_theme);
          }
        });
        
        
        

	$('label.varriant [type=checkbox]').on('change',function(){
		if($(this).prop('checked') == true){
			$(this).parent('label.varriant').addClass('checked');
		}
		else{
			$(this).parent('label.varriant').removeClass('checked');
		}
	});          
        
    });
    </script>
    
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php if($this->session->flashdata('success')):?>
<script>alert_success("<?php echo $this->session->flashdata('success')?>");</script>
<?php endif;?>
<?php if($this->session->flashdata('error')):?>
<script>alert_danger("<?php echo $this->session->flashdata('error')?>");</script>
<?php endif;?>
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url();?>admin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini text-right"><img src="<?php echo base_url('assets/admin/img/')?>settings_logo.png" class="img-responsive"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg text-left"><img src="<?php echo base_url('assets/admin/img/')?>settings_logo.png" class="img-responsive"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <h3 class="page-title"><?php echo !empty($title)?$title:ucwords(str_replace('_', ' ', $this->uri->segment(2)));?></h3>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         <li class="user user-menu">
            <a href="<?php echo base_url('admin/profile');?>">
              <img src="<?php echo !empty($this->session->userdata('user_image'))?base_url('uploads/user/').$this->session->userdata('user_image'):base_url('assets/admin/img/placeholder.png');?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo !empty($this->session->userdata('user_name'))?$this->session->userdata('user_name'):'Name';?></span>
            </a>
					</li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="<?php echo base_url('admin/logout');?>"><i class="icon-logout"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  