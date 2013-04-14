<?php
$this->breadcrumbs=array(
	'Review Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ReviewTypes', 'url'=>array('index')),
	array('label'=>'Manage ReviewTypes', 'url'=>array('admin')),
);
?>

<h1>Create ReviewTypes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>