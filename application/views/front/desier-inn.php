

<section class="inn-common-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <div class="common-main-heading">
                    <h6><?=$our_causes->our_causes_heading;?></h6>
                </div>
                <div class="desier-slider owl-carousel owl-theme">
                    <div class="item">
                        <div class="desier-slider-img">
                            <img src="<?= base_url('uploads/our_causes/');?><?=$our_causes->our_causes_image;?>"
                                class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div class="desier-slider-img">
                            <img src="<?= base_url('uploads/our_causes/');?><?=$our_causes->our_causes_image;?>"
                                class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="common-donate-box">
                    <div class="common-box-text">
                        <h4><?=$our_causes->our_causes_goal_amount;?></h4>
                        <p>Donated</p>
                    </div>
                    <div class="common-box-bar">
                        <p><span>50% </span>raised of <span>goal</span></p>
                        <div class="progress-custom-3">
                            <div class="progress-bar-custom-3" role="progressbar" style="width: 50%;" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <button>MAKE A DONATION</button>
                    </div>
                </div>
            </div>
            <div class="inn-common-main-para">
                <p><?=$our_causes->our_causes_description;?></p>
            </div>
            <div class="inn-common-qoute">
                <p>Your sponsorship, or if you prefer, a one-time donation of any amount, will have a significant impact
                    on the children.</p>
                <h2>-Tracey, managing director</h2>
            </div>
        </div>
</section>