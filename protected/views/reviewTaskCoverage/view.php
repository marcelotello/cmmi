<?php
$this->breadcrumbs=array(
	'Review Task Coverages'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ReviewTaskCoverage', 'url'=>array('index')),
	array('label'=>'Create ReviewTaskCoverage', 'url'=>array('create')),
	array('label'=>'Update ReviewTaskCoverage', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ReviewTaskCoverage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ReviewTaskCoverage', 'url'=>array('admin')),
);
?>

<h1>View ReviewTaskCoverage #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'review_tasks_id_FK',
		'description',
		'specific_goals_id_FK',
		'process_area_id_FK',
		'process_area_category_id_FK',
	),
)); ?>
