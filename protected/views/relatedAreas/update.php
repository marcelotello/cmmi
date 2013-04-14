<?php
$this->breadcrumbs=array(
	'Related Areases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RelatedAreas', 'url'=>array('index')),
	array('label'=>'Create RelatedAreas', 'url'=>array('create')),
	array('label'=>'View RelatedAreas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RelatedAreas', 'url'=>array('admin')),
);
?>

<h1>Update RelatedAreas <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>