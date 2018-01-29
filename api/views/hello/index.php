<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
this is hello
<h1><?=Html::encode($view_test1);?></h1>
<h1><?=HtmlPurifier::process($view_test1);?></h1>
<?php $this->beginBlock('block1');?>
<h1>replace</h1>
<?php $this->endBlock();?>
<?php echo $this->render('about',array('v_about'=>'about_data'));?>
