<?php
$this->breadcrumbs=array(
	'Specific Goals',
);

$this->menu=array(
	array('label'=>'Create SpecificGoals', 'url'=>array('create')),
	array('label'=>'Manage SpecificGoals', 'url'=>array('admin')),
);
?>

<h1>Specific Goals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
