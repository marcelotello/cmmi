<?php
$this->breadcrumbs=array(
	'Process Area Categories',
);

$this->menu=array(
	array('label'=>'Create ProcessAreaCategory', 'url'=>array('create')),
	array('label'=>'Manage ProcessAreaCategory', 'url'=>array('admin')),
);
?>

<h1>Process Area Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
