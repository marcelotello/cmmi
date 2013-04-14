<?php
$this->breadcrumbs=array(
	'Process Area Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProcessAreaCategory', 'url'=>array('index')),
	array('label'=>'Manage ProcessAreaCategory', 'url'=>array('admin')),
);
?>

<h1>Create ProcessAreaCategory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>