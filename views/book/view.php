<?php

/* @var $this yii\web\View */
use yii\helpers\Html;


?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <ul class="catalog category-products">
                        <?= \app\components\MenuWidget::widget(['tpl' => 'menu'])?>
                    </ul>
                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
                                <li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                <li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
                                <li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
                                <li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                <li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                <li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                            </ul>
                        </div>
                    </div><!--/brands_products-->

                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                            <b>$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->

                    <div class="shipping text-center"><!--shipping-->
                        <img src="images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <?=Html::img("@web/images/books/{$book->img}", ['alt' => $book->name])?>

                        </div>
<!--                        <div id="similar-product" class="carousel slide" data-ride="carousel">-->
<!---->
<!--                            <div class="carousel-inner">-->
<!--                                <div class="item active">-->
<!--                                    <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>-->
<!--                                    <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>-->
<!--                                    <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>-->
<!--                                </div>-->
<!--                                <div class="item">-->
<!--                                    <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>-->
<!--                                    <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>-->
<!--                                    <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>-->
<!--                                </div>-->
<!--                                <div class="item">-->
<!--                                    <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>-->
<!--                                    <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>-->
<!--                                    <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>-->
<!--                                </div>-->

<!--                            </div>-->

<!--                            <a class="left item-control" href="#similar-product" data-slide="prev">-->
<!--                                <i class="fa fa-angle-left"></i>-->
<!--                            </a>-->
<!--                            <a class="right item-control" href="#similar-product" data-slide="next">-->
<!--                                <i class="fa fa-angle-right"></i>-->
<!--                            </a>-->
<!--                        </div>-->

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <?php if ($book->new) :?>
                                <?=Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'newarrival'])?>
                            <?php endif; ?>
                            <?php if ($book->sale) :?>
                                <?=Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'newarrival'])?>
                            <?php endif; ?>
                            <h2><?= $book->name?></h2>
                            <p>Web ID: 1089772</p>
                            <img src="images/product-details/rating.png" alt="" />
                            <span>
									<span>US $<?= $book->price?></span>
									<label>Quantity:</label>
									<input type="text" value="1" />
									 <a href="<?= Url::to(['cart/add', 'id' => $book->id])?>" data-id="<?= $hit->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</span>
                            <p><b>Availability:</b> In Stock</p>
                            <p><b>Condition:</b> New</p>
                            <p><b>Brand:</b> <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $book->category->id]) ?>"> <?= $book->category->name?></a></p>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->

                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">




                        <div class="tab-pane fade active in" id="reviews" >
                            <div class="col-sm-12">
                                <p><?= $book->content?></p>


                            </div>
                        </div>

                    </div>
                </div>



            </div>
        </div>
    </div>
</section>