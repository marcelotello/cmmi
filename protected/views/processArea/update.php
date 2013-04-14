<?php
$this->breadcrumbs=array(
	'Process Areas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProcessArea', 'url'=>array('index')),
	array('label'=>'Create ProcessArea', 'url'=>array('create')),
	array('label'=>'View ProcessArea', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProcessArea', 'url'=>array('admin')),
);
?>

<h1>Update ProcessArea <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>