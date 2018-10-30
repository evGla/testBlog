<?php
?>
<h1><?= $publication->title?></h1>
<?= $publication->text?>
<br><br><br>
<p>Author: <?=Yii::$app->user->identity->username?></p>
<p>Created: <?=$publication->date_create?></p>
<p>Last update: <?=$publication->date_update?></p>