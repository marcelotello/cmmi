<?php
$this->breadcrumbs=array(
	'Process Area Categories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProcessAreaCategory', 'url'=>array('index')),
	array('label'=>'Create ProcessAreaCategory', 'url'=>array('create')),
	array('label'=>'Update ProcessAreaCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProcessAreaCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProcessAreaCategory', 'url'=>array('admin')),
);
?>

<h1>View ProcessAreaCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'code',
		'description',
	),
)); ?>
