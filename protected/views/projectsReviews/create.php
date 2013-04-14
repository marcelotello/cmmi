<?php
$this->breadcrumbs=array(
	'Projects Reviews'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProjectsReviews', 'url'=>array('index')),
	array('label'=>'Manage ProjectsReviews', 'url'=>array('admin')),
);
?>

<h1>Create ProjectsReviews</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>