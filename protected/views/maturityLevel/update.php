<?php
$this->breadcrumbs=array(
	'Maturity Levels'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MaturityLevel', 'url'=>array('index')),
	array('label'=>'Create MaturityLevel', 'url'=>array('create')),
	array('label'=>'View MaturityLevel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MaturityLevel', 'url'=>array('admin')),
);
?>

<h1>Update MaturityLevel <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>