<?php
$this->breadcrumbs=array(
	'Projects Roles'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProjectsRoles', 'url'=>array('index')),
	array('label'=>'Create ProjectsRoles', 'url'=>array('create')),
	array('label'=>'View ProjectsRoles', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProjectsRoles', 'url'=>array('admin')),
);
?>

<h1>Update ProjectsRoles <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>