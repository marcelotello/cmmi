<?php
$this->breadcrumbs=array(
	'Generic Goals',
);

$this->menu=array(
	array('label'=>'Create GenericGoals', 'url'=>array('create')),
	array('label'=>'Manage GenericGoals', 'url'=>array('admin')),
);
?>

<h1>Generic Goals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
