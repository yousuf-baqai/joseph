

<section class="register-first-wrapper"style="background-image:url(<?=base_url();?>uploads/staff_page/<?=$staff_page_data->staff_page_background_image;?>)">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="index-second-top-text">
                    <?php if(!empty($staff_page_data->staff_page_main_heading)):?>
                    <h6>
                        <?=$staff_page_data->staff_page_main_heading;?>
                        <span class="line-1"></span>
                        <span class="line-2"></span>
                    </h6>
                    <?php endif;?>
                </div>
            </div>
            <?php foreach($staff_members as $staff):?>
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                <div class="index-third-wrap-main-box">
                    <div class="staff-wrap-img">
                        <img src="<?=base_url("uploads/staff_members/");?><?=$staff->staff_members_image;?>" class="img-fluid" alt="">
                    </div>
                    <div class="staff-wrap-wrap-text-main">
                         <div class="staff-wrap-text">
                            <div class="index-third-top-side-text">
                                <a href="#!"><?= $staff->staff_members_name;?></a>
                                <h3><?= $staff->staff_members_designation;?></h3>
                                <p><?= $staff->staff_members_details;?></p>
                            </div>
                         </div>
                        <div class="staff-wrap-links">
                            <ul>
                                <li><a href="#!"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="#!"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#!"><i class="fa-brands fa-google-plus-g"></i></a></li>
                                <li><a href="#!"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <div class="index-third-wrap-btn">
                            <a href="#!"><?=$staff->staff_members_read_more_button;?> <i class="fa-solid fa-caret-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</section>
