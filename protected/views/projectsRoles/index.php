<?php
$this->breadcrumbs=array(
	'Projects Roles',
);

$this->menu=array(
	array('label'=>'Create ProjectsRoles', 'url'=>array('create')),
	array('label'=>'Manage ProjectsRoles', 'url'=>array('admin')),
);
?>

<h1>Projects Roles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
