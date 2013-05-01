<?php
/* @var $this SysMessageController */
/* @var $model sysMessage */

$this->breadcrumbs=array(
	'Sys Messages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List sysMessage', 'url'=>array('index')),
	array('label'=>'Manage sysMessage', 'url'=>array('admin')),
);
?>

<h1>Create sysMessage</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>