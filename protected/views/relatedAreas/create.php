<?php
$this->breadcrumbs=array(
	'Related Areases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RelatedAreas', 'url'=>array('index')),
	array('label'=>'Manage RelatedAreas', 'url'=>array('admin')),
);
?>

<h1>Create RelatedAreas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>