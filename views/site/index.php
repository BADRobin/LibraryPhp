<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
?>

<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>Book</span>-LIBRARY</h1>
                                <h2>Библиотека — дом радости и знаний</h2>
                                <p>Я не знаю человека кто хотя бы в жизни раз не пришел в библиотеку,
                                    Не порадовал бы нас. </p>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png"  class="pricing" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>Book</span>-LIBRARY</h1>
                                <h2>Ходить в библиотеку — повысить свой статус!</h2>
                                <p>Читаь-это мудро
                                    Читать-это модно. </p>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png"  class="pricing" alt="" />
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>Book</span>-LIBRARY</h1>
                                <h2>Брось мышку! Возьми книжку!</h2>
                                <p>Премьеры книг, обсуждения,
                                    Дискуссии, выставки. </p>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png" class="pricing" alt="" />
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->

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
                        <div class="well text-center">
                            <div class="slider slider-horizontal" style="width: 183px;"><div class="slider-track"><div class="slider-selection" style="left: 41.66%; width: 33.33%;"></div><div class="slider-handle round left-round" style="left: 41.66%;"></div><div class="slider-handle round" style="left: 75%;"></div></div><div class="tooltip top" style="left: 74.25px; top: -30px;"><div class="tooltip-arrow"></div><div class="tooltip-inner">250 : 450</div></div><input class="span2" id="sl2" type="text" value="" data-slider-value="[250,450]" data-slider-step="5" data-slider-max="600" data-slider-min="0"></div><br>
                            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->

                    <div class="shipping text-center"><!--shipping-->
                        <img src="images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <?php if (!empty($hits) ): ?>
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Лучшее</h2>
                        <?php foreach ($hits as $hit)   : ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <?=Html::img("@web/images/books/{$hit->img}", ['alt' => $hit->name])?>
                                            <h2>$<?= $hit->price?></h2>
                                            <p><a href="<?= Url::to(['book/view', 'id' =>$hit->id])?>"><?= $hit->name?></a> </p>
                                            <a href="<?= Url::to(['cart/add', 'id' => $hit->id])?>" data-id="<?= $hit->id?>" class="btn btn-default add-to-cart">
                                                <i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>

                                        <?php if ($hit->new) :?>
                                            <?=Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new'])?>
                                        <?php endif; ?>
                                        <?php if ($hit->sale) :?>
                                            <?=Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'new'])?>
                                        <?php endif; ?>
                                        <img class="new" alt="" src="image/home/new.png">
                                    </div>
                                    <div class="choose">
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div><!--features_items-->
                <?php endif; ?>

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Рекомендуем эти книги</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <?=Html::img("@web/images/books/{$hit->img}", ['alt' => $hit->name])?>
                                                <h2>$<?= $hit->price?></h2>
                                                <p><a href="<?= Url::to(['book/view', 'id' =>$hit->id])?>"><?= $hit->name?></a> </p>
                                                <a href="<?= Url::to(['cart/add', 'id' => $hit->id])?>" data-id="<?= $hit->id?>" class="btn btn-default add-to-cart">
                                                    <i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <?=Html::img("@web/images/books/{$hit->img}", ['alt' => $hit->name])?>
                                                <h2>$<?= $hit->price?></h2>
                                                <p><a href="<?= Url::to(['book/view', 'id' =>$hit->id])?>"><?= $hit->name?></a> </p>
                                                <a href="<?= Url::to(['cart/add', 'id' => $hit->id])?>" data-id="<?= $hit->id?>" class="btn btn-default add-to-cart">
                                                    <i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <?=Html::img("@web/images/books/{$hit->img}", ['alt' => $hit->name])?>
                                                <h2>$<?= $hit->price?></h2>
                                                <p><a href="<?= Url::to(['book/view', 'id' =>$hit->id])?>"><?= $hit->name?></a> </p>
                                                <a href="<?= Url::to(['cart/add', 'id' => $hit->id])?>" data-id="<?= $hit->id?>" class="btn btn-default add-to-cart">
                                                    <i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <?=Html::img("@web/images/books/{$hit->img}", ['alt' => $hit->name])?>
                                                <h2>$<?= $hit->price?></h2>
                                                <p><a href="<?= Url::to(['book/view', 'id' =>$hit->id])?>"><?= $hit->name?></a> </p>
                                                <a href="<?= Url::to(['cart/add', 'id' => $hit->id])?>" data-id="<?= $hit->id?>" class="btn btn-default add-to-cart">
                                                    <i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <?=Html::img("@web/images/books/{$hit->img}", ['alt' => $hit->name])?>
                                                <h2>$<?= $hit->price?></h2>
                                                <p><a href="<?= Url::to(['book/view', 'id' =>$hit->id])?>"><?= $hit->name?></a> </p>
                                                <a href="<?= Url::to(['cart/add', 'id' => $hit->id])?>" data-id="<?= $hit->id?>" class="btn btn-default add-to-cart">
                                                    <i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <?=Html::img("@web/images/books/{$hit->img}", ['alt' => $hit->name])?>
                                                <h2>$<?= $hit->price?></h2>
                                                <p><a href="<?= Url::to(['book/view', 'id' =>$hit->id])?>"><?= $hit->name?></a> </p>
                                                <a href="<?= Url::to(['cart/add', 'id' => $hit->id])?>" data-id="<?= $hit->id?>" class="btn btn-default add-to-cart">
                                                    <i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>
<script>
    $( ".catalog" ).dcAccordion();
</script>
<script>
    function showCart(cart){
        $('#cart .modal-body').html(cart);
        $('#cart').modal();
    }
</script>
<script>
    $('.del-item').on('click', function () {
        alert (123);
    })
</script>
<script>
    function clearCart(){
        $.ajax({
            url: '/cart/clear',
            type: 'GET',
            success: function(res){
                if(!res) alert('Ошибка!');
                showCart(res);
            },
            error: function(){
                alert('ERROR');
            }
        });
    }
</script>
<script>
    function getCart() {
        $.ajax({
            url: '/cart/show',
            type: 'GET',
            success: function(res){
                if(!res) alert('Ошибка!');
                showCart(res);
            },
            error: function(){
                alert('ERROR');
            }
        });
        return false;
    }
</script>
<script>
    $('#cart .modal-body').on('click', '.del-item', function(){
        var id = $(this).data('id');
        $.ajax({
            url: '/cart/del-item',
            data: {id: id},
            type: 'GET',
            success: function(res){
                if(!res) alert('Ошибка!');
                //console.log(res);
                showCart(res);
            },
            error: function(){
                alert('ERROR');
            }
        });
    });
</script>
