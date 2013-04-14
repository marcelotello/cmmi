<?php
$this->breadcrumbs=array(
	'Process Areas',
);

$this->menu=array(
	array('label'=>'Create ProcessArea', 'url'=>array('create')),
	array('label'=>'Manage ProcessArea', 'url'=>array('admin')),
);
?>

<h1>Process Areas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
