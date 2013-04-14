<?php
$this->breadcrumbs=array(
	'Projects Roles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProjectsRoles', 'url'=>array('index')),
	array('label'=>'Create ProjectsRoles', 'url'=>array('create')),
	//array('label'=>'Update ProjectsRoles', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProjectsRoles', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProjectsRoles', 'url'=>array('admin')),
);
?>

<h1>View ProjectsRoles #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'projectsIdFK.description',
		'usersIdFK.username',
		'rolesIdFK.description',
		
	),
)); ?>
