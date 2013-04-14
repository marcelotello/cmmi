<?php
$this->breadcrumbs=array(
	'Maturity Levels',
);

$this->menu=array(
	array('label'=>'Create MaturityLevel', 'url'=>array('create')),
	array('label'=>'Manage MaturityLevel', 'url'=>array('admin')),
);
?>

<h1>Maturity Levels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
