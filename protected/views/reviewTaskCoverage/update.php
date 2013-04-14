<?php
$this->breadcrumbs=array(
	'Review Task Coverages'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ReviewTaskCoverage', 'url'=>array('index')),
	array('label'=>'Create ReviewTaskCoverage', 'url'=>array('create')),
	array('label'=>'View ReviewTaskCoverage', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ReviewTaskCoverage', 'url'=>array('admin')),
);
?>

<h1>Update ReviewTaskCoverage <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>