<?php
$this->breadcrumbs=array(
	'Maturity Levels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MaturityLevel', 'url'=>array('index')),
	array('label'=>'Manage MaturityLevel', 'url'=>array('admin')),
);
?>

<h1>Create MaturityLevel</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>