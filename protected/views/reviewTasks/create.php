<?php
$this->breadcrumbs=array(
	'Review Tasks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ReviewTasks', 'url'=>array('index')),
	array('label'=>'Manage ReviewTasks', 'url'=>array('admin')),
);
?>

<h1>Create ReviewTasks</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>