<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use kartik\widgets\Growl;
/* @var $this \yii\web\View */
/* @var $content string */

dmstr\web\AdminLteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="login-page">

<?php $this->beginBody() ?>
	<?php if(\Yii::$app->getSession()->hasFlash('error')){ ?>
			
			<?= Growl::widget([
				'type' => Growl::TYPE_DANGER,
				'title' => 'Ada Kesalahan!',
				'icon' => 'glyphicon glyphicon-exclamation-sign',
				'body' => Yii::$app->session->getFlash('error'),
				'showSeparator' => true,
				
			]);?>
		<?php } ?>
    <?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
