<div class="col-sm-3 collection-filter">
                        <div class="collection-filter-block">
                            <div class="collection-mobile-back">
                                <span class="filter-back">
                                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                                    back
                                </span>
                            </div>
                            <div class="collection-collapse-block border-0 open">
                                <h3 class="collapse-block-title">Categories</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">
                                        <ul class="category-list">
                                            <?php foreach (getCategoryList() as $valueCL) { ?>
                                            <li><a href="<?=base_url('Home/allProducts/'.$listType.'/'.$valueCL->category_id);?>"><?=$valueCL->category_title;?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="collection-filter-block">
                            <div class="product-service">
                                <div class="media">
                                    <img src="<?=base_url('public/front_assets/icons/free.png')?>" style="width: 30px;">
                                    <div class="media-body">
                                        <h4>Free  Templates</h4>
                                        <p style="line-height: 22px;font-size: 12px;text-align: justify;">Why not download 3274 free website templates. All of the templates have been built using CSS & HTML or XHTML.</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <img src="<?=base_url('public/front_assets/icons/premium.png')?>" style="width: 30px;">
                                    <div class="media-body">
                                        <h4>Premium  Templates</h4>
                                        <p style="line-height: 22px;font-size: 12px;text-align: justify;">If you can't find a free CSS website template that suits your needs, then why not take a look at the premium templates here.</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <img src="<?=base_url('public/front_assets/icons/html.png')?>" style="width: 30px;">
                                    <div class="media-body">
                                        <h4>HTML Builder</h4>
                                        <p style="line-height: 22px;font-size: 12px;text-align: justify;">If you can't find a free and Premium website template that suits your needs, then why not take a look at the custom html builder.</p>
                                    </div>
                                </div>
                                <div class="media border-0 m-0">
                                    <img src="<?=base_url('public/front_assets/icons/on-demand.png')?>" style="width: 30px;">
                                    <div class="media-body">
                                        <h4>On Demand</h4>
                                        <p style="line-height: 22px;font-size: 12px;text-align: justify;">if you want according to your demand , we will provide a facility to develop html according to your instructions. We will provide best developers.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>