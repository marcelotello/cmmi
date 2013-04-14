<?php
$this->breadcrumbs=array(
	'Process Areas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProcessArea', 'url'=>array('index')),
	array('label'=>'Create ProcessArea', 'url'=>array('create')),
	array('label'=>'Update ProcessArea', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProcessArea', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProcessArea', 'url'=>array('admin')),
);
?>

<h1>View ProcessArea: <?php echo $model->code; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'code',
		'description',
		'purpose_statement',
		'maturity_level.description',
		'category.description',
		
	),
)); ?>
<h2>Introductory notes</h2>
<div> <?php echo $model->introductory_notes; ?> </div>

