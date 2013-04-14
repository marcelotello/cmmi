<?php
$this->breadcrumbs=array(
	'Review Task Coverages',
);

$this->menu=array(
	array('label'=>'Create ReviewTaskCoverage', 'url'=>array('create')),
	array('label'=>'Manage ReviewTaskCoverage', 'url'=>array('admin')),
);
?>

<h1>Review Task Coverages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
