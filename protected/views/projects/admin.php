<?php
$this->breadcrumbs=array(
	'Projects'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Projects', 'url'=>array('index')),
	array('label'=>'Create Projects', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('projects-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Projects</h1>

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
	'id'=>'projects-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'code',
		'description',
		'departmentsIdFK.description',
		array(
		'name'=>'iscandidate',
		'header'=>'Candidate',
		'value'=>'Lookup::itemCandidate($data->iscandidate)',
		),
		'start_date',
		'end_date',
		array(
		'name'=>'isactive',
		'header'=>'Active',
		'value'=>'Lookup::itemStatus($data->isactive)',
		),
		array(
			'class'=>'CButtonColumn',
			'header'=>'Options',
			'htmlOptions'=>array('width'=>'75px'),
			'template'=>'{view}{update}{delete}{addteam}',
			'buttons'=>array
			(
				'addteam' => array
				(
					'label'=>'Add a team member',
					'imageUrl'=>Yii::app()->theme->baseUrl.'/images/users.png',
					'url'=>'Yii::app()->createUrl("ProjectsRoles/create", array("id"=>$data->id))',
				),
				
			),
		),
		
	),
)); ?>
