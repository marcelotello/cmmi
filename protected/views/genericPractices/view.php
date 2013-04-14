<?php
$this->breadcrumbs=array(
	'Generic Practices'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List GenericPractices', 'url'=>array('index')),
	array('label'=>'Create GenericPractices', 'url'=>array('create')),
	array('label'=>'Update GenericPractices', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GenericPractices', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GenericPractices', 'url'=>array('admin')),
);
?>

<h1>View GenericPractices #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'code',
		'description',
		'genericGoalsIdFK.description',
	),
)); ?>
