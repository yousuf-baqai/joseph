<footer class="footer-wrapper">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                <div class="footer-wrap-left">
                    <div class="footer-wrap-logo">
                        <a href="<?=base_url()."";?>"><img src="<?=base_url();?>assets/front/images/logo.png" class="img-fluid" alt=""></a>
                    </div>
                    <div class="footer-wrap-left-text">
                        <ul>
                            <li><i class="fa-solid fa-phone"></i>+1-202-555-0102</li>
                            <li><i class="fa-regular fa-envelope"></i>info@thehumanitarianfund.org</li>
                        </ul>
                    </div>
                    <div class="footer-wrap-left-icon">
                        <ul>
                            <li><a href="#!"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="#!"><i class="fa-brands fa-twitter"></i></a></li>
                            <li><a href="#!"><i class="fa-brands fa-google-plus-g"></i></a></li>
                            <li><a href="#!"><i class="fa-brands fa-pinterest"></i></a></li>
                            <li><a href="#!"><img src="<?=base_url();?>assets/front/images/youtube-icon.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-8 col-xl-8 col-xxl-8">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
                        <div class="footer-wrap-link">
                            <h4>Links</h4>
                            <ul>
                                <li><a href="#!">Home</a></li>
                                <li><a href="#!">Our Causes</a></li>
                                <li><a href="#!">Recent news</a></li>
                                <li><a href="#!">Events</a></li>
                                <li><a href="#!">Staff</a></li>
                                <li><a href="#!">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                        <div class="footer-wrap-link">
                            <h4>Latest News</h4>
                            <div class="footer-wrap-link-text">
                                <p>Is everyone happy during the holidays?</p>
                                <span>April 10, 2014</span>
                            </div>
                            <div class="footer-wrap-link-text">
                                <p>The Joy of Giving</p>
                                <span>April 10, 2014</span>
                            </div>
                            <div class="footer-wrap-link-text">
                                <p>Is everyone happy during the holidays?</p>
                                <span>April 10, 2014</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-5 col-xxl-5">
                        <!--<div class="footer-form">-->
                        <!--    <h6>Contact Form</h6>-->
                        <!--    <div class="footer-form-input">-->
                        <!--        <input type="text" placeholder="Full Name">-->
                        <!--    </div>-->
                        <!--    <div class="footer-form-input">-->
                        <!--        <input type="text" placeholder="Email Address">-->
                        <!--    </div>-->
                        <!--    <div class="footer-form-textarea">-->
                        <!--        <textarea></textarea>-->
                        <!--    </div>-->
                        <!--    <div class="footer-form-btn">-->
                        <!--        <input type="submit">-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="footer-new">
                            <h6>NEWSLETTER</h6>
                            <p>Subscribe to our newsletter today for the latest updates and events.</p>
                            <div class="footer-new-btn">
                                <a href="#!">Email Address <i class="fa-solid fa-paper-plane"></i></a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="copyright-text">
                <h5>All Rights Reserved <span> Humanitarian Fund</span></h5>
            </div>
        </div>
    </div>
</footer>
<!-- PROGRESS_BAR -->
<script>
    const slider_input = document.getElementById('slider_input'),
      slider_thumb = document.getElementById('slider_thumb'),
      slider_line = document.getElementById('slider_line');

function showSliderValue() {
  slider_thumb.innerHTML = slider_input.value;
  const bulletPosition = (slider_input.value /slider_input.max),
        space = slider_input.offsetWidth - slider_thumb.offsetWidth;

  slider_thumb.style.left = (bulletPosition * space) + 'px';
  slider_line.style.width = slider_input.value + '%';
}

showSliderValue();
window.addEventListener("resize",showSliderValue);
slider_input.addEventListener('input', showSliderValue, false);
</script>
<!-- PROGRESS_BAR -->

<script src="<?= base_url();?>assets/front/js/popper.min.js"></script>
<script src="<?= base_url();?>assets/front/js/bootstrap.min.js"></script>
<script src="<?= base_url();?>assets/front/js/jquery-3.6.3.min.js"></script>
<script src="<?= base_url();?>assets/front/js/owl.carousel.min.js"></script>
<script src="<?= base_url();?>assets/front/js/custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
<script src="<?= base_url();?>assets/front/js/scrolltrigger.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://jsuites.net/v4/jsuites.js"></script>
<script>
    <?php if ($this->session->flashdata('success')): ?>
onload = function() {
    jSuites.notification({
        name: 'Success',
        message: '<?php echo $this->session->flashdata('success'); ?>',
    })
}
<?php endif;?>
</script>
</body>
</html>