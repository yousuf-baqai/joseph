

<section class="common-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="contact-first-wrap-text">
                    <h2>Contact Form</h2>
                    <h6>Fill The Below Form</h6>
                </div>
            </div>
            <div class="col-12 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                <form action="<?= base_url('contact_form/index');?>" method="post">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <div class="contact-first-input">
                            <input type="text" placeholder="First Name" name="contact_form_first_name" required />
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <div class="contact-first-input">
                            <input type="text" placeholder="Last Name" name="contact_form_last_name" required />
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <div class="contact-first-input">
                            <input type="email" placeholder="Email Address" name="contact_form_email" required />
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <div class="contact-first-input">
                            <input type="tel" placeholder="Phone Number" name="contact_form_phone" required />
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="contact-first-input">
                            <textarea placeholder="Your Message" name="contact_form_message" required ></textarea>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="contact-first-input">
                            <button type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
            <div class="col-12 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                <div class="google-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25895663.485556163!2d-95.665!3d37.599999999999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2s!4v1657022441338!5m2!1sen!2s"
                        width="100%"
                        height="360"
                        style="border: 0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                    ></iframe>
                </div>
            </div>
        </div>
    </div>
</section>


