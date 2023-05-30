

<section class="register-first-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="index-second-top-text">
                    <h6>
                        REGISTER
                        <span class="line-1"></span>
                        <span class="line-2"></span>
                    </h6>
                </div>
            </div>
            <form action="<?= base_url('signup/register');?>" method='post'>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
    
                <div class="register-first-wrap-input">
                    <input type="text" placeholder="Full Name" name='member_name'>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                <div class="register-first-wrap-input">
                    <input type="text" placeholder="Email" name='member_email'>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-4">
                <div class="register-first-wrap-input">
                    <input type="text" placeholder="Password" name='member_password'>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="register-first-wrap-btn">
                    <input type="submit">
                </div>
            </div>
            </form>
        </div>
    </div>
</section>


