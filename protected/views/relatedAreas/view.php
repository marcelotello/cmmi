<?php
$this->breadcrumbs=array(
	'Related Areases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RelatedAreas', 'url'=>array('index')),
	array('label'=>'Create RelatedAreas', 'url'=>array('create')),
	array('label'=>'Update RelatedAreas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RelatedAreas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RelatedAreas', 'url'=>array('admin')),
);
?>

<h1>View RelatedAreas #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_process_area',
		'description',
		'Process_Area_id_FK',
	),
)); ?>
