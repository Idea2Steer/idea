<div class="light-layout">
    <div class="container">
        <section class="small-section">
            <div class="row">
                <div class="col-xl-6 offset-xl-3">
                    <div class="subscribe">

                        <h4>newsletter</h4>
                        <form class="form-inline subscribe-form classic-form" action="#" onsubmit="newsletterSubscribeByUsers();return false" id="newsletterSubscribeByUsersForm"  method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="ns_email" name="ns_email" placeholder="Enter your email">

                            </div>
                            <button type="submit" class="btn btn-solid" id="ns_butt">subscribe</button>
                            <button type="button" id="ns_w_butt" class="btn btn-solid" style="display: none;" disabled><i class="fa fa-spinner fa-spin"></i> Please wait..</button>
                        </form>
                        <p class="error offset-xl-2" id="err_ns_email" style="text-align: left;padding-left: 10px;"></p>
                         <br>
                        <div class="alert alert-success flasMsg" id="ns_msg" style="display: none;">
                        </div>
                    </div>
                   
                    
                </div>
            </div>
        </section>
    </div>
</div>