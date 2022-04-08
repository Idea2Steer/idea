<?=$this->extend("front/template_main")?>
<?=$this->section("content")?>
 <?=$this->include("front/includes/breadcrumb"); ?>
      <!-- section start -->
    <section class="section-b-space">
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <!-- 1111 -->
                    <?=$this->include("front/includes/left-bar-2"); ?>
                    <!-- Right VContent -->
                    <div class="col-lg-9 col-sm-12">
                        <div class="container-fluid p-0">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="filter-main-btn mb-2"><span class="filter-btn"><i class="fa fa-filter"
                                                aria-hidden="true"></i> Sidebar</span></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="product-slick">

                                        <div><img src="<?=base_url('public/upload/product_thumbnail/'.$productInfo->product_main_image);?>" alt="" class="img-fluid blur-up lazyload image_zoom_cls-0"></div>

                                        <?php 
                                           $other_images = json_decode($productInfo->other_images); 
                                           $other_images_1 = $other_images->image_1;
                                           $other_images_2 = $other_images->image_2;
                                           $other_images_3 = $other_images->image_3;
                                           $other_images_4 = $other_images->image_4;
                                         ?>
                                        <?php if($other_images_1 != ''){ ?> 
                                        <div><img src="<?=base_url('public/upload/product_other_image/'.$other_images_1);?>" alt=""
                                                class="img-fluid blur-up lazyload image_zoom_cls-1"></div>
                                        <?php } ?>    
                                        <?php if($other_images_2 != ''){ ?>     
                                        <div><img src="<?=base_url('public/upload/product_other_image/'.$other_images_2);?>" alt=""
                                                class="img-fluid blur-up lazyload image_zoom_cls-2"></div>
                                        <?php } ?>  
                                        <?php if($other_images_3 != ''){ ?>           
                                        <div><img src="<?=base_url('public/upload/product_other_image/'.$other_images_3);?>" alt=""
                                                class="img-fluid blur-up lazyload image_zoom_cls-3"></div>
                                        <?php } ?>        
                                    </div>
                                    <div class="row">
                                        <div class="col-12 p-0">
                                            <div class="slider-nav">
                                                <div><img src="<?=base_url('public/upload/product_thumbnail/'.$productInfo->product_main_image);?>" alt="" class="img-fluid blur-up lazyload"></div>
                                                <?php if($other_images_1 != ''){ ?> 
                                                <div><img src="<?=base_url('public/upload/product_other_image/'.$other_images_1);?>" alt=""
                                                        class="img-fluid blur-up lazyload"></div>
                                                <?php } ?>
                                                <?php if($other_images_2 != ''){ ?>           
                                                <div><img src="<?=base_url('public/upload/product_other_image/'.$other_images_2);?>" alt=""
                                                        class="img-fluid blur-up lazyload"></div>
                                                <?php } ?> 
                                                <?php if($other_images_3 != ''){ ?>         
                                                <div><img src="<?=base_url('public/upload/product_other_image/'.$other_images_3);?>" alt=""
                                                        class="img-fluid blur-up lazyload"></div>
                                                <?php } ?>            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 rtl-text">
                                    <div class="product-right">
                                        
                                        <h2><?=$productInfo->product_title?></h2>
                                        <div class="label-section">
                                            <span class="badge badge-grey-color"># <?=getCategoryInfo($productInfo->category_id)?></span>
                                        </div>
                                         <!-- 11 -->
                                         <?php 
                                            $demo_url = $productInfo->demo_url  =='' ? base_url('Home/productInfo/'.$productInfo->product_id) : $productInfo->demo_url;
                                          ?>
                                        <?php if($productInfo->premium_status == '0'){ ?>
                                        <div class="product-buttons">
                                            <a href="<?=base_url('Home/downloadProductZip/'.$productInfo->product_id)?>" id="cartEffect" class="btn btn-solid hover-solid btn-animation">   
                                                <i class="fa fa-download me-1" aria-hidden="true"></i> Download 
                                            </a>
                                            <a href="<?=$demo_url?>" class="btn btn-solid" target="_blank">
                                                <i class="fa fa-bookmark fz-16 me-2" aria-hidden="true"></i>Live Demo
                                            </a>
                                        </div>
                                       <?php }else{ ?>
                                        <div class="product-buttons">
                                            <a href="<?=$productInfo->premium_url?>" id="cartEffect" class="btn btn-solid hover-solid btn-animation">   
                                                <i class="fa fa-shopping-cart me-1" aria-hidden="true"></i> Buy now 
                                            </a>
                                            <a href="<?=$demo_url?>" class="btn btn-solid" target="_blank">
                                                <i class="fa fa-bookmark fz-16 me-2" aria-hidden="true"></i>Live Demo
                                            </a>
                                        </div>
                                       <?php } ?> 
                                        
                                         
                                        <div class="border-product">
                                            <h6 class="product-title">Product info</h6>
                                            <ul class="shipping-info">
                                                <li>Bootstrap , jQuery</li>
                                                <li>Responsive</li>
                                                <li><a href="<?=base_url('Home/allProducts/'.$productInfo->premium_status.'/'.$productInfo->category_id)?>" style="color: #777777;"><?=getCategoryInfo($productInfo->category_id)?></a></li>
                                                <?php if($productInfo->sub_category_id != ''){ ?>
                                                <li><?=getSubCategoryInfo($productInfo->sub_category_id)?></li>
                                                <?php } ?>
                                                <?php if($productInfo->premium_status == '0'){ ?>
                                                <li><?=$productInfo->total_downloads?> Downloads</li>
                                                <?php } ?>  
                                            </ul>
                                        </div>
                                        <div class="border-product">
                                            <h6 class="product-title">share it</h6>
                                            <div class="product-icon">
                                                <ul class="product-social">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section class="tab-product m-0">
                            <div class="row">
                                <div class="col-sm-12 col-lg-12">
                                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" id="profile-top-tab"
                                                data-bs-toggle="tab" href="#top-profile" role="tab"
                                                aria-selected="false"><i
                                                    class="icofont icofont-man-in-glasses"></i>Specification</a>
                                            <div class="material-border"></div>
                                        </li>
                                        
                                         
                                    </ul>
                                    <div class="tab-content nav-material" id="top-tabContent">
                                        <div class="tab-pane fade show active" id="top-profile" role="tabpanel"
                                            aria-labelledby="profile-top-tab">
                                            <p><?=$productInfo->product_descriptions?></p>
                                            <div class="single-product-tables">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>Bootstrap</td>
                                                            <td>Yes</td>
                                                        </tr>
                                                        <tr>
                                                            <td>jQuery</td>
                                                            <td>Yes</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Responsive</td>
                                                            <td>Yes</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Premium</td>
                                                            <td><?=$productInfo->premium_status=="1" ? 'Yes' : 'No';?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                               
                                            </div>
                                        </div>
                                         

                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->



   <!-- related products -->
    <section class="section-b-space pt-0 ratio_asos">
        <div class="container">
            <div class="row">
                <div class="col-12 product-related">
                    <h2>related products</h2>
                </div>
            </div>
            <div class="row search-product">
                <!-- 1 -->
                <?php foreach ($related_products as $valueRP) {
                      if($valueRP->product_id != $productInfo->product_id){  
                         $other_images_RP = json_decode($valueRP->other_images); 
                         $other_images_RP_1 = $other_images_RP->image_1;
                         if($other_images_RP_1 == ''){
                               $back =  base_url('public/upload/product_thumbnail/'.$valueRP->product_main_image);
                         }else{
                               $back = base_url('public/upload/product_other_image/'.$other_images_RP_1);
                         }
                         
                 ?>
                <div class="col-xl-2 col-md-4 col-6">
                    <div class="product-box">
                         <?php if($valueRP->premium_status =='1'){ ?>
                        <div class="lable-block-cum">
                            <span class="lable4-cum"><img src="<?=base_url('public/front_assets/premium.png');?>" style="width: 60px;"></span>
                         </div>
                        <?php } ?>
                        <div class="img-wrapper">
                            <div class="front">
                                <a href="<?=base_url('Home/productInfo/'.$valueRP->product_id)?>"><img src="<?=base_url('public/upload/product_thumbnail/'.$valueRP->product_main_image);?>"
                                        class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                            <div class="back">
                                <a href="<?=base_url('Home/productInfo/'.$valueRP->product_id)?>"><img src="<?=$back;?>" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                        </div>
                        <div class="product-detail">
                            <a href="<?=base_url('Home/productInfo/'.$valueRP->product_id)?>">
                                <h6><?=$valueRP->product_title?></h6>
                            </a>
                        </div>
                    </div>
                </div>
                <?php } } ?>
                <!-- 1 -->
                  
            </div>
        </div>
    </section>
    <!-- related products -->

<?=$this->endSection()?>    