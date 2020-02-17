<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

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

                    <div class="brands_products">
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
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center"><?=$author->name ?></h2>
                    <?php $i = 0; if (!empty($books)): ?>
                        <?php foreach ($books as $book): ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <?=Html::img("@web/images/books/{$book->img}", ['alt' => $book->name])?>
                                    <h2>$<?= $book->price?></h2>
                                    <p><a href="<?= Url::to(['book/view', 'id' =>$book->id])?>"><?= $book->name?></a></p>
                                    <a href="<?= Url::to(['cart/add', 'id' => $book->id])?>" data-id="<?= $book->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <?php if ($book->new) :?>
                                    <?=Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new'])?>
                                <?php endif; ?>
                                <?php if ($book->sale) :?>
                                    <?=Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'new'])?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                        <?php $i++ ?>
                        <?php if ($i % 3 == 0): ?>
                            <div class="clearfix"></div>
                        <?php endif;?>
                    <?php endforeach;?>
                        <div class="clearfix"></div>
                        <?php echo  yii\widgets\LinkPager::widget(['pagination' => $pages]); ?>

                        <?php else:?>
                        <h2>Книг нет</h2>
<?php endif;?>



                </div>
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
