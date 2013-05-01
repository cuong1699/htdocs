<?php
/* @var $this SysMessageController */
/* @var $model sysMessage */

$this->breadcrumbs=array(
	'Sys Messages'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List sysMessage', 'url'=>array('index')),
	array('label'=>'Create sysMessage', 'url'=>array('create')),
	array('label'=>'View sysMessage', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage sysMessage', 'url'=>array('admin')),
);
?>

<h1>Update sysMessage <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>