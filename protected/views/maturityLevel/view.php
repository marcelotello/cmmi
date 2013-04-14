<?php
$this->breadcrumbs=array(
	'Maturity Levels'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MaturityLevel', 'url'=>array('index')),
	array('label'=>'Create MaturityLevel', 'url'=>array('create')),
	array('label'=>'Update MaturityLevel', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MaturityLevel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MaturityLevel', 'url'=>array('admin')),
);
?>

<h1>View MaturityLevel #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'level',
		'description',
	),
)); ?>
