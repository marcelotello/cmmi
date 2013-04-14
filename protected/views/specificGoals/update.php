<?php
$this->breadcrumbs=array(
	'Specific Goals'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SpecificGoals', 'url'=>array('index')),
	array('label'=>'Create SpecificGoals', 'url'=>array('create')),
	array('label'=>'View SpecificGoals', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SpecificGoals', 'url'=>array('admin')),
);
?>

<h1>Update SpecificGoals <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>