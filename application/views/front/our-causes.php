

<section class="common-wrapper"style="background-image:url(<?=base_url();?>uploads/our_causes_page/<?=$our_causes_data->our_causes_page_background_image;?>)">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="index-second-top-text">
                    <?php if(!empty($our_causes_data->our_causes_page_main_heading)):?>
                    <h6>
                        <?=$our_causes_data->our_causes_page_main_heading;?>
                        <span class="line-1"></span>
                        <span class="line-2"></span>
                    </h6>
                    <?php endif;?>
                </div>
            </div>
            <div class="common-main-tabs">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                    <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
                        <?php $i=0; foreach($our_causes_categories as $category):?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link <?=($i==0)?'active':'';?>" id="pills-home-tab-<?=$category->our_causes_category_id;?>" data-bs-toggle="pill" data-bs-target="#pills-home-<?=$category->our_causes_category_id;?>" type="button" role="tab" aria-controls="pills-home-<?=$category->our_causes_category_id;?>" aria-selected="true"><?=$category->our_causes_category_name;?></button>
                        </li>
                        <?php $i++; endforeach;?>
                    </ul>
                </div>
                <div class="tab-content" id="pills-tabContent">
                <?php $i=0; foreach($our_causes_categories as $category):?>
                    <div class="tab-pane fade show <?=($i == 0)?'active':'';?>" id="pills-home-<?=$category->our_causes_category_id;?>" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row justify-content-center">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                <?php foreach($our_causes as $causes):if($causes->our_causes_category == $category->our_causes_category_id):?>
                                <a href="<?=base_url()."ourcauses/causes/".$causes->our_causes_slug;?>">
                                    <div class="index-second-wrap-main-box">
                                        <div class="index-second-wrap-box-img">
                                            <img src="<?= base_url('uploads/our_causes/');?><?=$causes->our_causes_image;?>" class="img-fluid" alt="" />
                                        </div>
                                        <div class="index-second-wrap-box-center-text">
                                            <h5>0%</h5>
                                            <img src="assets/front/images/card-ring.png" calss="img-fluid" alt="" />
                                        </div>
                                        <div class="index-second-wrap-box-text">
                                            <h5><?=$causes->our_causes_heading;?></h5>
                                            <p><?=$causes->our_causes_description;?></p>
                                            <h4>Raised: $0 <span><?=$causes->our_causes_goal_amount;?></span></h4>
                                        </div>
                                    </div>
                                </a>
                                <?php endif; endforeach;?>
                            </div>
                        </div>
                    </div>
                    <?php $i++; endforeach;?>
                </div>
            </div>
        </div>
    </div>
</section>
