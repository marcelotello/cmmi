<?php
$this->breadcrumbs=array(
	'Projects Reviews',
);

$this->menu=array(
	array('label'=>'Create Projects Reviews', 'url'=>array('create')),
	array('label'=>'Manage Projects Reviews', 'url'=>array('admin')),
);
?>

<h1>Projects Reviews</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
