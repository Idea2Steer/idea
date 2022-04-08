<?=$this->extend("front/template_main")?>
<?=$this->section("content")?>
 <!-- Home Slider -->
    <section class="p-0">
        <div class="slide-1 home-slider">
            <div>
                <div class="home text-start p-left">
                    <img src="<?=base_url('public/front_assets/assets/images/home-banner/new_slider/1.jpg');?>" alt="" class="bg-img blur-up lazyload">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="slider-contain">
                                    <div>
                                        <h4>We have <?=$totalProducts?>+ HTMLs templates</h4>
                                        <h1>for your website</h1>
                                        <a href="<?=base_url('Home/allProducts/0')?>" class="btn btn-outline btn-classic">Download  now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="home text-start p-left">
                    <img src="<?=base_url('public/front_assets/assets/images/home-banner/new_slider/4.jpg');?>" alt="" class="bg-img blur-up lazyload">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="slider-contain">
                                    <div>
                                        <h4><?=$totalCategory?>+ category for filtration</h4>
                                        <h1>on html templates</h1>
                                        <a href="<?=base_url('Home/allProducts/1')?>" class="btn btn-outline btn-classic">Download now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div>
                <div class="home text-start p-left">
                    <img src="<?=base_url('public/front_assets/assets/images/home-banner/11.jpg');?>" alt="" class="bg-img blur-up lazyload">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="slider-contain">
                                    <div>
                                        <h4>welcome to fashion</h4>
                                        <h1>men's shoes</h1><a href="#" class="btn btn-outline btn-classic">shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <!-- Home slider end -->

    <!-- timer banner -->
    <section>
        <div class="container">
            <div class="row banner-timer">
                <div class="col-md-6">
                    <div class="banner-text">
                        <h2>Save <span>30% off</span> Digital Watch</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="timer-box">
                        <div class="timer">
                            <p id="demo"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- timer banner end -->


    <!-- category 1 -->
    <section class="section-b-space ratio_portrait">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="slide-4 category-m no-arrow">
                        <!-- 1 -->
                        <?php foreach ($resultPD_1 as $value_pd_1) { ?>
                        <div>
                            <div class="category-wrapper">
                                <div>
                                    <div>
                                        <?php if($value_pd_1->premium_status =='1'){ ?>
                                        <div class="lable-block-cum">
                                            <span class="lable3-cum"><img src="<?=base_url('public/front_assets/premium.png');?>" style="width: 60px;"></span>
                                         </div>
                                        <?php } ?>
                                        <img src="<?=base_url('public/upload/product_thumbnail/'.$value_pd_1->product_main_image);?>"
                                            class="img-fluid blur-up lazyload bg-img" alt="">
                                    </div>
                                    <h4>
                                        <a href="<?=base_url('Home/productInfo/'.$value_pd_1->product_id)?>" style="color: #000;"><?=$value_pd_1->product_title?></a>
                                    </h4>
                                    <ul class="category-link">
                                        <li><a href="#"><?=getCategoryInfo($value_pd_1->category_id)?></a></li>
                                    </ul>
                                    <a href="<?=base_url('Home/productInfo/'.$value_pd_1->product_id)?>" class="btn btn-outline">view more</a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                         
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- category 1 end -->

        <!-- category 2 -->
    <section class="section-b-space ratio_portrait">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="slide-4 category-m no-arrow">
                        <?php foreach ($resultPD_2 as $value_pd_2) { ?>
                        <div>
                            <div class="category-wrapper">
                                <div>
                                    <div>
                                        <?php if($value_pd_2->premium_status =='1'){ ?>
                                        <div class="lable-block-cum">
                                            <span class="lable3-cum"><img src="<?=base_url('public/front_assets/premium.png');?>" style="width: 60px;"></span>
                                         </div>
                                        <?php } ?> 

                                        <img src="<?=base_url('public/upload/product_thumbnail/'.$value_pd_2->product_main_image);?>"
                                            class="img-fluid blur-up lazyload bg-img" alt="">
                                    </div>
                                    <h4><a href="<?=base_url('Home/productInfo/'.$value_pd_2->product_id)?>" style="color: #000;"><?=$value_pd_2->product_title?></a></h4>
                                     <ul class="category-link">
                                        <li><a href="#"><?=getCategoryInfo($value_pd_2->category_id)?></a></li>
                                    </ul>
                                    <a href="<?=base_url('Home/productInfo/'.$value_pd_2->product_id)?>" class="btn btn-outline">view more</a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- category 2 end -->
  

    <!-- collection banner -->
    <section class="ratio_45">
        <div class="container">
            <div class="row partition3">
                <div class="col-md-4">
                    <a href="#">
                        <div class="collection-banner p-left">
                            <div class="img-part">
                                <img src="<?=base_url('public/front_assets/assets/images/banner1.jpg');?>" class="img-fluid blur-up lazyload bg-img"
                                    alt="">
                            </div>
                            <div class="contain-banner banner-3">
                                <div>
                                    <h4>minimum 10% off</h4>
                                    <h2>new watch</h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#">
                        <div class="collection-banner p-left text-start">
                            <div class="img-part">
                                <img src="<?=base_url('public/front_assets/assets/images/banner2.jpg');?>" class="img-fluid blur-up lazyload bg-img"
                                    alt="">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#">
                        <div class="collection-banner p-left">
                            <div class="img-part">
                                <img src="<?=base_url('public/front_assets/assets/images/banner.jpg');?>" class="img-fluid blur-up lazyload bg-img" alt="">
                            </div>
                            <div class="contain-banner banner-3">
                                <div>
                                    <h4>minimum 50% off</h4>
                                    <h2>gold watch</h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- collection banner end -->

 


    <!-- blog section -->
    <section class="blog blog-bg section-b-space ratio2_3 slick-default-margin">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title4">
                        <h4>our collection</h4>
                        <h2 class="title-inner4">Top Category</h2>
                        <div class="line"><span></span></div>
                    </div>
                    <div class="slide-3 no-arrow">
                        <?php foreach ($categoryList as $valueCT) { 
                            $category_image = $valueCT->category_image =='' ? 'dummy.jpg' : $valueCT->category_image;
                            ?>
                        <div>
                            <a href="<?=base_url('Home/allProducts/0/'.$valueCT->category_id)?>">
                                <div class="classic-effect">
                                    <div>
                                        <img src="<?=base_url('public/upload/category_images/'.$category_image);?>"  class="img-fluid blur-up lazyload bg-img" alt="">
                                    </div>
                                    <span></span>
                                </div>
                            </a>
                            <div class="blog-details">
                                <h4><?=getTotalProductByCategory($valueCT->category_id)?> Templates</h4>
                                <a href="<?=base_url('Home/allProducts/0/'.$valueCT->category_id)?>">
                                    <p><?=$valueCT->category_title?></p>
                                </a>
                                <hr class="style1">
                                <!-- <h6>by: John Dio , 2 Comment</h6> -->
                            </div>
                        </div>
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog section end-->


    <!-- service layout -->
    <div class="container">
        <section class="service section-b-space border-section border-top-0">
            <div class="row partition4">
                <div class="col-lg-3 col-md-6 service-block1">
                    <img src="<?=base_url('public/front_assets/icons/free.png')?>">
                    <h4>Free Html Templates</h4>
                    <p>Why not download 3274 free site templates. Each of the templates have been constructed utilizing CSS and HTML or XHTML.</p>
                </div>
                <div class="col-lg-3 col-md-6 service-block1">
                    <img src="<?=base_url('public/front_assets/icons/premium.png')?>">
                    <h4>Premium Html Templates</h4>
                    <p>In case you can't find a free CSS site template that suits your requirements, why not take the exceptional premium templates here.</p>
                </div>
                <div class="col-lg-3 col-md-6 service-block1">
                    <img src="<?=base_url('public/front_assets/icons/html.png')?>">
                    <h4>HTML Builder</h4>
                    <p>In case you can't find a free and Premium site format that suits your requirements, why not use the custom html Builder.</p>
                </div>
                <div class="col-lg-3 col-md-6 service-block1">
                    <img src="<?=base_url('public/front_assets/icons/on-demand.png')?>">
                    <h4>On Request</h4>
                    <p>If you want according to your request , we will provide a facility to develop html according to your instructions. We will provide best developers.</p>
                </div>
            </div>
        </section>
    </div>
    <!-- service layout end-->
<?=$this->endSection()?>    