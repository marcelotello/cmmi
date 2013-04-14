<?php
$this->breadcrumbs=array(
	'Incidents',
);

$this->menu=array(
	array('label'=>'Create Incidents', 'url'=>array('create')),
	array('label'=>'Manage Incidents', 'url'=>array('admin')),
);
?>

<h1>Incidents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
