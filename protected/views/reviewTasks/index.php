<?php
$this->breadcrumbs=array(
	'Review Tasks',
);

$this->menu=array(
	array('label'=>'Create ReviewTasks', 'url'=>array('create')),
	array('label'=>'Manage ReviewTasks', 'url'=>array('admin')),
);
?>

<h1>Review Tasks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
