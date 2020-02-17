<?php

/* @var $this yii\web\View */
use yii\helpers\Html;


?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Жанр</h2>
                    <ul class="catalog category-products">
                        <?= \app\components\MenuWidget::widget(['tpl' => 'menu'])?>
                    </ul>

                    <div class="brands_products"><!--brands_products-->
                        <h2>Авторы</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <?= \app\components\MenuAuthWidget::widget(['tpl' => 'select'])?>
                            </ul>
                        </div>
                    </div>

                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                            <b>$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->

                    <div class="shipping text-center"><!--shipping-->
                        <img src="images/home/shipping.jpg" alt="" />
                    </div>


                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <div class="product-details">
                    <div class="col-sm-5">
                        <div class="view-product">
                            <?=Html::img("@web/images/books/{$book->img}", ['alt' => $book->name])?>

                        </div>

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
								</span>
                            <p><b>Автор:</b> <a href="<?= \yii\helpers\Url::to(['author/view', 'id' => $author->author->id]) ?>"> <?= $author->author->name?></a></p>
                            <p><b>Жанр:</b> <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $book->category->id]) ?>"> <?= $book->category->name?></a></p>
                        </div>
                    </div>
                </div>

                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#reviews" data-toggle="tab">Краткое описание</a></li>
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