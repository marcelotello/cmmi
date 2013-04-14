<?php
$this->breadcrumbs=array(
	'Process Areas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProcessArea', 'url'=>array('index')),
	array('label'=>'Manage ProcessArea', 'url'=>array('admin')),
);
?>

<h1>Create ProcessArea</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>