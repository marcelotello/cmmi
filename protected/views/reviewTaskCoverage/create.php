<?php
$this->breadcrumbs=array(
	'Review Task Coverages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ReviewTaskCoverage', 'url'=>array('index')),
	array('label'=>'Manage ReviewTaskCoverage', 'url'=>array('admin')),
);
?>

<h1>Create ReviewTaskCoverage</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>