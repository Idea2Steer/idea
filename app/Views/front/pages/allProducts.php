<?=$this->extend("front/template_main")?>
<?=$this->section("content")?>
 <?=$this->include("front/includes/breadcrumb"); ?>
  

    <!-- section start -->
    <section class="section-b-space ratio_asos">
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <!-- Left Bar -->
                     <?=$this->include("front/includes/left-bar-2"); ?>
                    <!-- Main -->
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- Ads -->
                                    <div class="top-banner-wrapper">
                                        <a href="#"><img src="<?=base_url('public/front_assets/assets/images/mega-menu/2.jpg');?>" class="img-fluid blur-up lazyload" alt=""></a>
                                    </div>
                                    <!-- End Ads -->
                                    <div class="collection-product-wrapper">
                                        <div class="product-wrapper-grid">
                                            <div class="row margin-res">
                                              <?php foreach($allProductList as $valueAPL) {
                                                    $other_images_APL = json_decode($valueAPL->other_images); 
                                                     $other_images_APL_1 = $other_images_APL->image_1;
                                                     if($other_images_APL_1 == ''){
                                                           $back =  base_url('public/upload/product_thumbnail/'.$valueAPL->product_main_image);
                                                     }else{
                                                           $back = base_url('public/upload/product_other_image/'.$other_images_APL_1);
                                                     }

                                               ?>
                                                <div class="col-xl-4 col-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="<?=base_url('Home/productInfo/'.$valueAPL->product_id);?>">
                                                                    <img src="<?=base_url('public/upload/product_thumbnail/'.$valueAPL->product_main_image);?>" class="img-fluid blur-up lazyload bg-img" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="back">
                                                                <a href="<?=base_url('Home/productInfo/'.$valueAPL->product_id);?>">
                                                                    <img src="<?=$back;?>" class="img-fluid blur-up lazyload bg-img" alt="">
                                                                </a>
                                                            </div>
                                                             
                                                        </div>
                                                        <div class="product-detail">
                                                            <div>
                                                               <a href="<?=base_url('Home/allProducts/'.$listType.'/'.$valueAPL->category_id);?>">
                                                                     <h4><?=getCategoryInfo($valueAPL->category_id)?></h4>
                                                               </a>
                                                               <a href="<?=base_url('Home/productInfo/'.$valueAPL->product_id);?>">
                                                                    <h6><?=$valueAPL->product_title?></h6>
                                                               </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               <?php } ?>   
                                               <!-- 1 -->
                                                
                                            </div>
                                        </div>
                                         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section End -->

<?=$this->endSection()?>    