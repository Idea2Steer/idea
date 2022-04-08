<?=$this->extend("front/template_main")?>
<?=$this->section("content")?>
 <?=$this->include("front/includes/breadcrumb"); ?>
<style>
    .contact-page .theme-form input,textarea{
        margin-bottom: 0px !important;
    }
</style>
    <!--section start-->
    <section class="contact-page section-b-space">
        <div class="container">
            <div class="row section-b-space">
                <div class="col-lg-5">
                    <div class="contact-right">
                        <ul>
                            <li>
                                <div class="contact-icon"><i class="fa fa-phone" aria-hidden="true"></i>
                                    <h6>Contact Us</h6>
                                </div>
                                <div class="media-body">
                                    <p>+91 7987166849</p>
                                    <p>+91 8517908552</p>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <h6>Address</h6>
                                </div>
                                <div class="media-body">
                                    <p>120, omax city 1 , India</p>
                                    <p>India</p>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon"><i class="fa fa-envelope" aria-hidden="true"></i>
                                    <h6>Email Address</h6>
                                </div>
                                <div class="media-body">
                                    <p>info@html-vlax.in</p>
                                    <p>vlaxgroup17@gmail.com</p>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon"><i class="fa fa-skype" aria-hidden="true"></i>
                                    <h6>Live On</h6>
                                </div>
                                <div class="media-body">
                                    <p>live:.cid.49b0ec3ae1f4935f</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-7">
                    <?php if(session()->getFlashdata('msg') != ''){ ?>
                    <div class="row flasMsg">
                         <div class="col-md-12">
                             <div class="alert alert-success">
                                <strong>Thank you !</strong> <?php echo session()->getFlashdata('msg'); ?>.
                              </div>
                         </div>   
                    </div>
                   <?php } ?> 
                   <form class="theme-form" action="<?php echo base_url('Home/saveEnquiryInfo'); ?>" method="post"  enctype="multipart/form-data" onsubmit="saveEnquiryInfo();return false" id="saveEnquiryInfoForm">
                        <div class="form-row row">
                            <div class="col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your name" >
                                <p class="error" id="err_name"></p>    
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" >
                                <p class="error" id="err_email"></p>    
                            </div>
                            <div class="col-md-6">
                                <label for="review">Whatsapp  Phone number (if Any)</label>
                                <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Enter your number"
                                    >
                            </div>
                            <div class="col-md-6">
                                <label for="email">Skype Id (If Any)</label>
                                <input type="text" class="form-control" id="skype_id" name="skype_id" placeholder="Skype Id">
                            </div>
                            <div class="col-md-12" style="margin-top: 15px;">
                                <label for="review">Write Your Message</label>
                                <textarea class="form-control" placeholder="Write Your Message" id="message" name="message" rows="6"></textarea>
                                <p class="error" id="err_message"></p>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-solid" type="submit" id="svin_butt">Send Your Message</button>
                                <button class="btn btn-solid" type="button" id="svin_w_butt" style="display: none;" disabled><i class="fa fa-spinner fa-spin"></i> Please wait..</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            
        </div>
    </section>
    <!--Section ends-->   

<?=$this->endSection()?>    