<?php
$this->breadcrumbs=array(
	'Review Task Coverages'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ReviewTaskCoverage', 'url'=>array('index')),
	array('label'=>'Create ReviewTaskCoverage', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('review-task-coverage-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Review Task Coverages</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('ext.groupgridview.GroupGridView', array(
	'id'=>'review-task-coverage-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	
	'mergeColumns' => array('processAreaCategory.code'),  
	'rowCssClassExpression'=>'$data->processAreaCategory->hexcolor',
	'columns'=>array(
	
		'processAreaCategory.code',
		'processArea.code',
		'reviewTask.description',
		'description',
		'specificGoal.description',
	          
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>


