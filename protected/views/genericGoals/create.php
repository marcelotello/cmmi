<?php
$this->breadcrumbs=array(
	'Generic Goals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GenericGoals', 'url'=>array('index')),
	array('label'=>'Manage GenericGoals', 'url'=>array('admin')),
);
?>

<h1>Create GenericGoals</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>