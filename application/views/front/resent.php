
<section class="common-wrapper" style="background-image:url(<?=base_url();?>uploads/recent_news_page/<?=$recent_news_page->recent_news_page_background_image;?>)">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="index-second-top-text">
                    <?php if(!empty($recent_news_page->recent_news_page_main_heading)):?>
                    <h6>
                        <?=$recent_news_page->recent_news_page_main_heading;?>
                        <span class="line-1"></span>
                        <span class="line-2"></span>
                    </h6>
                    <?php endif;?>
                </div>
            </div>
            <div class="common-main-tabs">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                    <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
                        <?php $i=0; foreach($recent_news_categories as $news_categories):?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link <?= ($i==0)?'active':'';?> " id="pills-home-tab-<?=$news_categories->recent_news_category_id;?>" data-bs-toggle="pill" data-bs-target="#pills-home-<?=$news_categories->recent_news_category_id;?>" type="button" role="tab" aria-controls="pills-home-<?=$news_categories->recent_news_category_id;?>" aria-selected="true"><?=$news_categories->recent_news_category_name;?></button>
                        </li>
                        <?php $i++; endforeach;?>
                    </ul>
                </div>
                <div class="tab-content" id="pills-tabContent">
                <?php $i = 0; foreach($recent_news_categories as $news_categories):?>
                    <div class="tab-pane fade show <?=($i==0)?'active':'';?>" id="pills-home-<?=$news_categories->recent_news_category_id;?>" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row justify-content-center">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                <?php foreach($recent_news as $news):if($news->recent_news_category == $news_categories->recent_news_category_id):?>
                                <div class="index-third-wrap-main-box">
                                    <div class="index-third-wrap-img">
                                        <img src="<?= base_url('uploads/recent_news/')?><?= $news->recent_news_image;?>" class="img-fluid" alt="" />
                                    </div>
                                    <div class="index-third-wrap-text">
                                        <div class="index-third-wrap-side-text">
                                            <h6><?= $news->recent_news_date;?></h6>
                                            <div class="index-third-top-side-text">
                                                <h5><?=$news->recent_news_heading;?></h5>
                                                <h3><i class="fa-solid fa-user"></i><?=$news->recent_news_author_name;?> <i class="fa-solid fa-tag"></i><?=$news->recent_news_tag;?></h3>
                                            </div>
                                        </div>
                                        <p><?=$news->recent_news_description;?></p>
                                        <div class="index-third-wrap-btn">
                                            <a href="<?=base_url()."recentnews/news/".$news->recent_news_slug;?>">Read More <i class="fa-solid fa-caret-right"></i></a>
                                        </div>
                                    </div>
                                </div>
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


