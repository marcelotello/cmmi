<?php
$this->breadcrumbs=array(
	'Projects Roles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProjectsRoles', 'url'=>array('index')),
	array('label'=>'Manage ProjectsRoles', 'url'=>array('admin')),
);
?>

<h1>Create ProjectsRoles</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>