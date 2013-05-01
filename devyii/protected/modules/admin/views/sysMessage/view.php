<?php
/* @var $this SysMessageController */
/* @var $model sysMessage */

$this->breadcrumbs=array(
	'Sys Messages'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List sysMessage', 'url'=>array('index')),
	array('label'=>'Create sysMessage', 'url'=>array('create')),
	array('label'=>'Update sysMessage', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete sysMessage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage sysMessage', 'url'=>array('admin')),
);
?>

<h1>View sysMessage #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'message',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
	),
)); ?>
