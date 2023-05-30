<section class="index-banner-wrapper" style= "background-image:url(<?=base_url();?>uploads/home/<?=$home_page->home_page_section_one_background_image;?>)">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                <div class="index-banner-wrap-text">
                    <?php if(!empty($home_page->home_page_section_one_heading)):?>
                    <h6><?=$home_page->home_page_section_one_heading?><span><?=$home_page->home_page_section_one_spam?></span> <?=$home_page->home_page_section_one_heading_?></h6>
                    <?php endif;?>
                    <div class="index-banner-text-img">
                        <img src="assets/front/images/banner-text.png" class="img-fluid" alt="">
                    </div> 
                    <?php if(!empty($home_page->home_page_section_one_paragraph)):?>
                    <p><?=$home_page->home_page_section_one_paragraph;?></p>
                    <?php endif;?>
                    <div class="index-banner-wrap-btns">
                        <div class="index-banner-wrap-btn-1">
                            <a href="#!"><?=$home_page->home_page_section_one_button;?></a>
                        </div>
                        <div class="index-banner-wrap-btn-2">
                            <a href="#!"><?=$home_page->home_page_section_one_more_details;?><i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                    <div class="index-banner-review-box-flex">
                        <div class="index-banner-review-img">
                            <img src="assets/front/images/group-img.png" class="img-fluid" alt="">
                        </div>
                        <div class="index-banner-review-text">
                            <h2>Desire Daycare</h2>
                            <ul>
                                <li>
                                    <i class="fa-solid fa-star"></i>
                                </li>
                                <li>
                                    <p>4,8</p>
                                </li>
                                <li>
                                    <span>(12.5k Review)</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                <div class="index-banner-wrap-img">
                    <?php if(!empty($home_page->home_page_section_one_main_image)):?>
                    <img src="<?=base_url('uploads/home/');?><?=$home_page->home_page_section_one_main_image;?>" class="img-fluid" alt="">
                    <?php endif;?>
                    <div class="index-banenr-box-1">
                        <div class="index-banner-box-1-text">
                        <?php if(!empty($home_page->home_page_section_one_card_one_sub_heading)):?>
                            <h2><?=$home_page->home_page_section_one_card_one_sub_heading?></h2>
                            <?php endif;?>
                            <?php if(!empty($home_page->home_page_section_one_card_one_heading)):?>
                            <h4><?=$home_page->home_page_section_one_card_one_heading;?><span> <i class="fa-solid fa-arrow-up"></i><?=$home_page->home_page_section_one_card_one_spam;?> </span> </h4>
                            <?php endif;?>
                            <div class="progress-custom">
                                <div class="progress-bar-custom" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="index-banenr-box-2">
                        <div class="index-banner-box-2-text">
                        <?php if(!empty($home_page->home_page_section_one_card_two_sub_heading)):?>
                            <h2><?=$home_page->home_page_section_one_card_two_sub_heading;?></h2>
                            <?php endif;?>
                            <?php if(!empty($home_page->home_page_section_one_card_two_heading)):?>
                            <h4><?=$home_page->home_page_section_one_card_two_heading;?><span> <i class="fa-solid fa-arrow-down"></i> <?=$home_page->home_page_section_one_card_two_spam;?></span> </h4>
                            <?php endif;?>
                            <div class="progress-custom-1">
                                <div class="progress-bar-custom-1" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="index-banenr-box-3">
                        <div class="index-banner-box-3-text">
                        <?php if(!empty($home_page->home_page_section_one_card_three_heading)):?>
                            <h2><?=$home_page->home_page_section_one_card_three_heading;?></h2>
                            <?php endif;?>
                        </div>
                         <div class="joseph-benyola-tabs">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <div class="nav-link active index-banner-box-3-img-text" id="pills-injury-tab" data-bs-toggle="pill" data-bs-target="#pills-injury" type="button" role="tab" aria-controls="pills-injury" aria-selected="true">
                                        <img src="assets/front/images/box-1.png" class="img-fluid" alt="">
                                        <h4>Derek</h4>
                                    </div>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-malpractice-tab" data-bs-toggle="pill" data-bs-target="#pills-malpractice" type="button" role="tab" aria-controls="pills-malpractice" aria-selected="false">
                                    <div class="index-banner-box-3-img-text">
                                        <img src="assets/front/images/box-2.png" class="img-fluid" alt="">
                                        <h4>Shane</h4>
                                    </div>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-practice-tab" data-bs-toggle="pill" data-bs-target="#pills-practice" type="button" role="tab" aria-controls="pills-practice" aria-selected="false">
                                    <div class="index-banner-box-3-img-text">
                                        <img src="assets/front/images/box-3.png" class="img-fluid" alt="">
                                        <h4>Alvin</h4>
                                    </div
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-litigation-tab" data-bs-toggle="pill" data-bs-target="#pills-litigation" type="button" role="tab" aria-controls="pills-litigation" aria-selected="false">
                                    <div class="index-banner-box-3-img-text">
                                        <img src="assets/front/images/box-4.png" class="img-fluid" alt="">
                                        <h4>Bob</h4>
                                    </div>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-legal-tab" data-bs-toggle="pill" data-bs-target="#pills-legal" type="button" role="tab" aria-controls="pills-legal" aria-selected="false">
                                    <div class="index-banner-box-3-img-text">
                                        <img src="assets/front/images/box-5.png" class="img-fluid" alt="">
                                        <h4>Minnie</h4>
                                    </div>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-property-tab" data-bs-toggle="pill" data-bs-target="#pills-property" type="button" role="tab" aria-controls="pills-property" aria-selected="false">
                                    <div class="index-banner-box-3-img-text">
                                        <img src="assets/front/images/box-6.png" class="img-fluid" alt="">
                                        <h4>Melanie</h4>
                                    </div>
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="pills-injury" role="tabpanel" aria-labelledby="pills-injury-tab">
                                <div class="index-banner-box-3-text">
                                        <h3>$5200 Donated</h3>
                                        <div class="progress-custom-2">
                                            <div class="progress-bar-custom-2" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><p>43.33% Funded</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-malpractice" role="tabpanel" aria-labelledby="pills-malpractice-tab">
                                <div class="index-banner-box-3-text">
                                        <h3>$5200 Donated</h3>
                                        <div class="progress-custom-2">
                                            <div class="progress-bar-custom-2" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><p>43.33% Funded</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="tab-pane fade" id="pills-practice" role="tabpanel" aria-labelledby="pills-practice-tab">
                            <div class="index-banner-box-3-text">
                                <h3>$5200 Donated</h3>
                                <div class="progress-custom-2">
                                    <div class="progress-bar-custom-2" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><p>43.33% Funded</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-litigation" role="tabpanel" aria-labelledby="pills-litigation-tab">
                            <div class="index-banner-box-3-text">
                                <h3>$5200 Donated</h3>
                                <div class="progress-custom-2">
                                    <div class="progress-bar-custom-2" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><p>43.33% Funded</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-legal" role="tabpanel" aria-labelledby="pills-legal-tab">
                            <div class="index-banner-box-3-text">
                                <h3>$5200 Donated</h3>
                                <div class="progress-custom-2">
                                    <div class="progress-bar-custom-2" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><p>43.33% Funded</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-property" role="tabpanel" aria-labelledby="pills-property-tab">
                            <div class="index-banner-box-3-text">
                                    <h3>$5200 Donated</h3>
                                <div class="progress-custom-2">
                                    <div class="progress-bar-custom-2" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><p>43.33% Funded</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="common-mouse">
                    <h6>Scroll Down</h6>
                    <div class="common-mouse-pin">
                        <span></span>
                    </div>
                </div>
            </div>
    </div>
</section>

<section class="index-first-wrapper">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                <div class="index-first-top-text">
                    <?php if(!empty($home_page->home_page_section_two_heading_one)):?>
                    <h6><?=$home_page->home_page_section_two_heading_one;?></h6>
                    <?php endif;?> 
                </div>
                <div class="index-first-wrap-text-flex">
                    <div class="index-first-wrap-img">
                        <img src="assets/front/images/first-img.png" class="img-fluid" alt="">
                    </div>
                    <div class="index-first-wrap-text">
                        <h5>IS EVERYONE HAPPY DURING THE HOLIDAYS?</h5>
                        <h4>Holidays can be both joyous and depressive times.</h4>
                        <h3>Posted In</h3>
                        <div class="index-first-wrap-post-text-flex">
                            <p>Children -</p>
                            <h2>$45,800</h2>
                        </div>
                        <div class="index-first-wrap-post-text-flex">
                            <p>Donation -</p>
                            <h2>$45,800</h2>
                        </div>
                        <div class="index-first-wrap-range">
                            <div class="range-slider">
                                <div id="slider_thumb" class="range-slider_thumb"></div>
                                <div class="range-slider_line">
                                    <div id="slider_line" class="range-slider_line-fill"></div>
                                </div>
                                <input id="slider_input" class="range-slider_input" type="range" value="20" min="0" max="100">
                            </div>
                        </div>
                        <p>Holidays can be both joyous and depressive times. If you have family surrounding you the holidays can be the most joyous time of the year...</p>
                        <div class="index-first-wrap-text-btns-flex">
                            <div class="index-first-wrap-text-btn-1">
                                <a href="#!">Donate Now >></a>
                            </div>
                            <div class="index-first-wrap-text-btn-2">
                                <a href="#!">Read More <i class="fa-sharp fa-solid fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                <div class="index-first-top-text">
                <?php if(!empty($home_page->home_page_section_two_heading_two)):?>
                    <h6><?=$home_page->home_page_section_two_heading_two;?></h6> 
                    <?php endif;?>
                </div>
                <div class="index-first-wrap-slider owl-carousel owl-theme">
                    <?php foreach($cause as $causes):?>
                    <div class="item"> 
                        <div class="index-first-wrap-slider-main-box">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-5">
                                    <div class="index-first-wrap-slider-img">
                                        <img src="<?php echo base_url('uploads/our_causes/').$causes->our_causes_image;?>" alt="" class="img-fluid" width='500px'>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="index-first-wrap-slider-text-flex">
                                        <div class="index-first-wrap-slider-text">
                                            <div class="index-first-wrap-slider-main-flex-text">
                                                <h5><?php echo $causes->our_causes_heading;?></h5>
                                                <span><?php echo date( 'M-d', strtotime($causes->our_causes_created_at));?></span>
                                            </div>
                                            <div class="index-first-wrap-slider-text-1">
                                                <p> <i class="fa-regular fa-clock"></i> 6.00 PM - 8.30 PM <span><i class="fa-solid fa-location-dot"></i> MOUNT LAUREL, NJ 08054</span></p>
                                                <h2><?php echo mb_strimwidth($causes->our_causes_description,0, 60).'....';?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="index-second-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="index-second-top-text">
                    <?php if(!empty($home_page->home_page_section_three_heading)):?>
                    <h6><?=$home_page->home_page_section_three_heading;?>
                    <span class="line-1"></span> 
                    <span class="line-2"></span> 
                    </h6>
                    <?php endif;?>
                    <?php if(!empty($home_page->home_page_section_three_pragraph)):?>
                    <p><?=$home_page->home_page_section_three_pragraph;?></p>
                    <?php endif;?>
                </div>
            </div>
            <div class="recent-slider owl-carousel owl-theme">
                <?php foreach($cause as $causes):?>
                <div class="item">
                    <a href="<?=base_url()."ourcauses/causes/".$causes->our_causes_slug;?>">
                        <div class="index-second-wrap-main-box">
                            <div class="index-second-wrap-box-img">
                                <img src="<?php echo base_url('uploads/our_causes/').$causes->our_causes_image;?>" class="img-fluid" alt="">
                            </div>
                            <div class="index-second-wrap-box-center-text">
                                <h5>0%</h5>
                                <img src="assets/front/images/card-ring.png" calss="img-fluid" alt="">
                            </div>
                            <div class="index-second-wrap-box-text">
                                <h5><?php echo $causes->our_causes_heading;?></h5>
                                <p><?=$causes->our_causes_description;?></p>
                                <h4>Raised: $0 <span>Goal: $2500</span> </h4>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</section>

<section class="index-third-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="index-third-top-text">
                    <?php if(!empty($home_page->home_page_section_four_heading)):?>
                    <h6><?=$home_page->home_page_section_four_heading;?>
                    <span class="line-1"></span> 
                    <span class="line-2"></span> 
                    </h6>
                    <?php endif;?>
                    <?php if(!empty($home_page->home_page_section_four_paragraph)):?>
                    <p><?=$home_page->home_page_section_four_paragraph;?></p>
                    <?php endif;?>
                </div>
            </div>
            
            <div class="blog-slider owl-carousel owl-theme">
                    <?php foreach($recent_news as $news):?>
                    <div class="item">
                        <div class="index-third-wrap-main-box">
                            <div class="index-third-wrap-img">
                                <img src="<?= base_url('uploads/recent_news/')?><?= $news->recent_news_image;?>" class="img-fluid" alt="">
                            </div>
                            <div class="index-third-wrap-text">
                                <div class="index-third-wrap-side-text">
                                    <h6><?= $news->recent_news_date;?></h6>
                                    <div class="index-third-top-side-text">
                                        <h5><?=$news->recent_news_heading;?></h5>
                                        <h3><i class="fa-solid fa-user"></i> <?=$news->recent_news_author_name;?> <i class="fa-solid fa-tag"></i> <?=$news->recent_news_tag;?> </h3>
                                    </div>
                                </div>
                                <p><?=$news->recent_news_description;?></p>
                                <div class="index-third-wrap-btn">
                                    <a href="<?=base_url()."recentnews/news/".$news->recent_news_slug;?>">Read More <i class="fa-solid fa-caret-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
        </div>
    </div>
</section>  
