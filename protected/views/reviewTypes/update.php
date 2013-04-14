<?php
$this->breadcrumbs=array(
	'Review Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ReviewTypes', 'url'=>array('index')),
	array('label'=>'Create ReviewTypes', 'url'=>array('create')),
	array('label'=>'View ReviewTypes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ReviewTypes', 'url'=>array('admin')),
);
?>

<h1>Update ReviewTypes <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>