<?php
$this->breadcrumbs=array(
	'Projects Reviews'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ProjectsReviews', 'url'=>array('index')),
	array('label'=>'Create ProjectsReviews', 'url'=>array('create')),
	array('label'=>'Create Incident for review', 'url'=>array('/Incidents/Create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('projects-reviews-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Projects Reviews</h1>

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




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'projects-reviews-grid',
	'dataProvider'=>$model->search(),
	'rowCssClassExpression'=>'$data->getStatusColor()',
	'filter'=>$model,
	'columns'=>array(
		'id',
		'review_date',
		array(
		
		'name'=>'state',
		'header'=>'Status',
		'value'=>'Lookup::itemReviewStatus($data->state)',
		),
		'real_review_date',
		'evidence_url',
		'notes',
		
		'projectsIdFK.description',
		'reviewTasksIdFK.description',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
