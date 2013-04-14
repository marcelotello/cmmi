<?php
$this->breadcrumbs=array(
	'Incidents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Incidents', 'url'=>array('index')),
	array('label'=>'Manage Incidents', 'url'=>array('admin')),
);
?>

<h1>Create Incidents</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>