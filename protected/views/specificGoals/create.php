<?php
$this->breadcrumbs=array(
	'Specific Goals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SpecificGoals', 'url'=>array('index')),
	array('label'=>'Manage SpecificGoals', 'url'=>array('admin')),
);
?>

<h1>Create SpecificGoals</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>