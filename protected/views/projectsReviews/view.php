<?php
$this->breadcrumbs=array(
	'Projects Reviews'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProjectsReviews', 'url'=>array('index')),
	array('label'=>'Create ProjectsReviews', 'url'=>array('create')),
	array('label'=>'Update ProjectsReviews', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProjectsReviews', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProjectsReviews', 'url'=>array('admin')),
);
?>

<h1>View ProjectsReviews #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'review_date',
		array(
		'name'=>'iscandidate',
		'label'=>'Candidate',
		'value'=>Lookup::itemReviewStatus($model->state),
		),
		'real_review_date',
		'evidence_url',
		'notes',
		'projectsIdFK.description',
		'reviewTasksIdFK.description',
	),
)); ?>
