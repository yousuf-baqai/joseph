<section class="register-first-wrapper">
    <div class="container">
        <div class="index-second-top-text">
            <h6>
                LOGIN OR REGISTER
                <span class="line-1"></span>
                <span class="line-2"></span>
            </h6>
        </div>
        <form action="<?php echo base_url('login/verify');?>" method='post'>
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 col-xxl-7 mb-4">
                    <div class="login-first-wrap-input">
                        <input type="text" placeholder="Email" name='member_email'>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 col-xxl-7 mb-2">
                    <div class="login-first-wrap-input">
                        <input type="password" placeholder="Password" name='member_password'id="myInput1">
                        <i class="fa-solid fa-eye" id="eye" onclick="myFunction('myInput1')"></i>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 col-xxl-7 mb-4">
                    <div class="login-first-wrap-text">
                        <a href="#!">Forgot Password ?</a>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 col-xxl-7">
                    <div class="login-first-wrap-btn">
                        <input type="submit">
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                    <div class="login-first-last-text">
                        <p>Not a Member Yet ?</p>
                        <a href="<?php echo base_url('signup');?>">Register</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>


<script>
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
