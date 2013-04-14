<?php
$this->breadcrumbs=array(
	'Generic Goals'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List GenericGoals', 'url'=>array('index')),
	array('label'=>'Create GenericGoals', 'url'=>array('create')),
	array('label'=>'Update GenericGoals', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GenericGoals', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GenericGoals', 'url'=>array('admin')),
);
?>

<h1>View GenericGoals #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'code',
		'description',
		
	),
)); ?>
