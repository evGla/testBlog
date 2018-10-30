<div class="row">
    <?php foreach ($publications as $one): ?>
        <div class="col-lg-12">
            <h2><?=$one->title?></h2>
            <p><?=$one->text?></p>
            <?= \yii\bootstrap\Html::a('подробнее', ['publication/one', 'url'=> $one->url], ['class'=> 'btn btn-success'])?>
        </div>
    <?php endforeach; ?>
</div>