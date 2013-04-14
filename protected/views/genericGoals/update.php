<?php
$this->breadcrumbs=array(
	'Generic Goals'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GenericGoals', 'url'=>array('index')),
	array('label'=>'Create GenericGoals', 'url'=>array('create')),
	array('label'=>'View GenericGoals', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GenericGoals', 'url'=>array('admin')),
);
?>

<h1>Update GenericGoals <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>