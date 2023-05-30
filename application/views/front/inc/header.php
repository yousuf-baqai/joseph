<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url();?>assets/front/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/front/css/owl.carousel.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/front/css/owl.theme.default.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/front/css/all.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/front/css/main.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/front/css/responsive.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />

    <title>Joseph Benyola</title>
</head>
<body>
    <!-- HEADER_HTML_START_FROM_HERE -->

    <header class="header-main-wrapper">
            <div class="header-menu">
                <i class="fa-solid fa-bars"></i>
            </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                        <div class="header-logo">
                            <a href="<?=base_url()."";?>"><img src="<?=base_url();?>assets/front/images/logo.png" class="img-fluid" alt=""></a>
                        </div>
                    <div class="header-main-flex">
                        <div class="header-main-logo">
                            <a href="<?=base_url()."";?>"><img src="<?=base_url();?>assets/front/images/header-logo.png" class="img-fluid" alt=""></a>
                        </div>
                        <div class="header-main-links">
                            <ul>
                                <li>
                                    <a href="<?=base_url()."";?>">Home</a>
                                </li>
                                <li><a href="<?=base_url()."ourcauses";?>">Our causes <i class="fa-solid fa-chevron-down"></i></a>
                                    <ul class="dropdown">
                                        <li><a href="<?=base_url()."ourcauses";?>">Projects</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?=base_url()."recentnews";?>">Recent news <i class="fa-solid fa-chevron-down"></i></a>
                                    <ul class="dropdown">
                                        <li><a href="<?=base_url()."recentnews";?>">News</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?=base_url()."event"?>">Events <i class="fa-solid fa-chevron-down"></i></a>
                                    <ul class="dropdown">
                                        <li><a href="<?=base_url()."event"?>">Events</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?=base_url()."staff";?>">Staff</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()."news"?>">Newsletter</a>
                                </li>
                                <?php if($this->session->userdata('member_id')):?>
                                    
                                <li>
                                    <a href="<?=base_url()."logout"?>">logout</a>
                                </li>
                                <?php else:?>
                                <li>
                                    <a href="<?=base_url()."login"?>">Login</a>
                                </li>
                                <?php endif;?>
                            </ul>
                        </div>
                        <div class="header-main-btn">
                            <a href="<?=base_url()."Contact"?>">Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- HEADER_HTML_END_HERE -->
