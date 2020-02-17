<li>
    <a href="<?= \yii\helpers\Url::to(['author/view', 'id'=>$author['id']])?>">
        <?= $author['name']; ?>
        <?php if (isset($author['childs']) ): ?>
            <span class="badge pull-right">
                    <i class="fa fa-plus"></i></span>
        <?php endif; ?>


        <?php if (isset($author['childs'])): ?>
            <ul>
                <?= $this->getMenuHtml($author['childs']) ?>
            </ul>
        <?php endif;?>
    </a>
</li>