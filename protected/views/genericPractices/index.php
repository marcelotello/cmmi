<?php
$this->breadcrumbs=array(
	'Generic Practices',
);

$this->menu=array(
	array('label'=>'Create GenericPractices', 'url'=>array('create')),
	array('label'=>'Manage GenericPractices', 'url'=>array('admin')),
);
?>

<h1>Generic Practices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
