<?php
$this->breadcrumbs=array(
	'Generic Practices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GenericPractices', 'url'=>array('index')),
	array('label'=>'Manage GenericPractices', 'url'=>array('admin')),
);
?>

<h1>Create GenericPractices</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>