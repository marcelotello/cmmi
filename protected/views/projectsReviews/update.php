<?php
$this->breadcrumbs=array(
	'Projects Reviews'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProjectsReviews', 'url'=>array('index')),
	array('label'=>'Create ProjectsReviews', 'url'=>array('create')),
	array('label'=>'View ProjectsReviews', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProjectsReviews', 'url'=>array('admin')),
);
?>

<h1>Update ProjectsReviews <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>