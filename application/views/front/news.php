
<section class="news-first-wrapper">
    <div class="container">
        <div class="row gy-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="index-second-top-text">
                    <?php if(!empty($news_page->news_page_heading)):?>
                        <h6>
                            <?=$news_page->news_page_heading;?>
                            <span class="line-1"></span>
                            <span class="line-2"></span>
                        </h6>
                        <?php endif;?>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="news-wrap-text-up">
                    <?php if(!empty($news_page->news_page_main_heading_span).($news_page->news_page_main_heading)):?>
                    <h6><span><?=$news_page->news_page_main_heading_span;?></span><?=$news_page->news_page_main_heading;?></h6>
                    <?php endif;?>
                    <?php if(!empty($news_page->news_page_sub_heading)):?>
                    <p><?=$news_page->news_page_sub_heading;?></p>
                    <?php endif;?>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="news-first-wrap-search-flex">
                    <div class="news-first-wrap-inputs">
                        <?php if(!empty($news_page->news_page_search_bar_text)):?>
                        <input type="text" placeholder="<?=$news_page->news_page_search_bar_text;?>">
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <div class="news-first-wrap-text-up-1">
                <?php if(!empty($news_page->news_page_section_heading)):?>
                <p><?=$news_page->news_page_section_heading;?></p>
                <?php endif;?>
            </div>
            <?php foreach($news as $new):?>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                <div class="news-first-wrap-box">
                    <a href="<?php echo base_url('uploads/newletters/').$new->newletters_pdf;?>" target="_blank">
                        <h2><?php echo $new->newletters_heading;?> <i class="fa-regular fa-file-pdf"></i></h2>
                        <p>Year : <span> <?php echo $new->newletters_year;?></span></p>
                        <p>Date : <span> <?php echo $new->newletters_date;?></span></p>
                    </a>
                </div>
            </div>
            <?php endforeach;?>

        </div>
    </div>
</section>

