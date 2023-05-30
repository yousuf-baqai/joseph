
<section class="inn-common-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="every-wrap-top-text">
                    <h6><?=$recent_news->recent_news_heading;?></h6>
                    <p>Posted in: <a href="#!"><?= $recent_news->recent_news_category;?></a></p>  
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="every-wrap-img">
                    <img src="<?=base_url('uploads/recent_news/');?><?=$recent_news->recent_news_image;?>" class="img-fluid" alt="">
                    <div class="every-wrap-text">
                        <p><?=$recent_news->recent_news_description;?></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="every-wrap-qoute">
                    <?php if(!empty($recent_news->recent_news_quote)):?>
                    <p><?=$recent_news->recent_news_quote;?></p>
                    <?php endif;?>
                    <h2></h2>
                </div>
            </div>
        </div>
    </div>
</section>
