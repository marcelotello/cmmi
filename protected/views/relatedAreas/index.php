<?php
$this->breadcrumbs=array(
	'Related Areases',
);

$this->menu=array(
	array('label'=>'Create RelatedAreas', 'url'=>array('create')),
	array('label'=>'Manage RelatedAreas', 'url'=>array('admin')),
);
?>

<h1>Related Areases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
