
<section class="register-first-wrapper"
    style="background-image:url(<?=base_url("uploads/event_page/");?><?=$event_page_data->event_page_background_image;?>) ">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="index-second-top-text">
                    <?php if(!empty($event_page_data->event_page_main_heading)):?>
                    <h6>
                        <?=$event_page_data->event_page_main_heading;?>
                        <span class="line-1"></span>
                        <span class="line-2"></span>
                    </h6>
                    <?php endif;?>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="event-wrap-fields">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-12">
                            <div class="event-wrap-field">
                                <input type="text" placeholder="Name"></input>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="event-wrap-field">
                                <input type="text" placeholder="Name"></input>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="event-wrap-field">
                                <input type="text" placeholder="Name"></input>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="event-wrap-field">
                                <input type="text" placeholder="Name"></input>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="event-wrap-btn">
                                <a href="#!">Submit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="main-calender">
                    <div class="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</section>