<?php
$this->breadcrumbs=array(
	'Generic Practices'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GenericPractices', 'url'=>array('index')),
	array('label'=>'Create GenericPractices', 'url'=>array('create')),
	array('label'=>'View GenericPractices', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GenericPractices', 'url'=>array('admin')),
);
?>

<h1>Update GenericPractices <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>