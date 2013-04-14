<?php
$this->breadcrumbs=array(
	'Specific Goals'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SpecificGoals', 'url'=>array('index')),
	array('label'=>'Create SpecificGoals', 'url'=>array('create')),
	array('label'=>'Update SpecificGoals', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SpecificGoals', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SpecificGoals', 'url'=>array('admin')),
);
?>

<h1>View SpecificGoals #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'code',
		'description',
		'process_Area_id_FK',
	),
)); ?>
