<?php
$this->breadcrumbs=array(
	'Process Area Categories'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProcessAreaCategory', 'url'=>array('index')),
	array('label'=>'Create ProcessAreaCategory', 'url'=>array('create')),
	array('label'=>'View ProcessAreaCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProcessAreaCategory', 'url'=>array('admin')),
);
?>

<h1>Update ProcessAreaCategory <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>