<?php
?>
<h1><?= $publication->title?></h1>
<?= $publication->text?>
<br><br><br>
<p>Author: <?=Yii::$app->user->identity->username?></p>
<p>Created: <?=$publication->dateCreate?></p>
<p>Last update: <?=$publication->dateUpdate?></p>