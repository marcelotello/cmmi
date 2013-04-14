<?php
$this->breadcrumbs=array(
	'Process Areas'=>array('index'),
	'Manage',
);
/*
$this->menu=array(
	array('label'=>'List ProcessArea', 'url'=>array('index')),
	array('label'=>'Create ProcessArea', 'url'=>array('create')),
	
);*/



					
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('process-area-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Process Areas</h1>

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
<?php 
 
 $this->widget('ext.groupgridview.GroupGridView', array(
      'id' => 'process-area-grid',
      'dataProvider' => $model->search(),
      'mergeColumns' => array('category.code'),  
	  'rowCssClassExpression'=>'$data->category->hexcolor',
      'columns' => array(
		'category.code',
		'code',
        'description',
		'maturity_level.description',
        array(
			//'class'=>'CButtonColumn',
			'class'=>'EJuiDlgsColumn',
			'buttons'=>array(
				'view' => array(
								'label'=> 'ajax dialog view',
								),
 
				'delete' => array(
								'label'=> 'delete',
								),
            ),
			
			'viewDialog'=>array(
             //'controllerRoute' => 'view', //=default
             //'actionParams' => array('id' => '$data->primaryKey'), //=default
             'dialogTitle' => 'View process area',
                         'hideTitleBar' => false, 
             'dialogWidth' => 800, //use the value from the dialog config
             'dialogHeight' => 600,
			),
			
			'updateDialog'=>array(
               //'controllerRoute' => 'update', //=default
               //'actionParams' => array('id' => '$data->primaryKey'), //=default
               'dialogTitle' => 'View detail',
               'dialogWidth' => 1024, //override the value from the dialog config
               'dialogHeight' => 600,
            ),
			
		),
      ),
    ));
	EQuickDlgs::iframeButton(
    array(
        'controllerRoute' => 'create',
        'dialogTitle' => 'Create item',
        'dialogWidth' => 800,
        'dialogHeight' => 600,
        'openButtonText' => 'Create new',
        'closeButtonText' => 'Close',
        'closeOnAction' => true, //important to invoke the close action in the actionCreate
        'refreshGridId' => 'group-grid', //the grid with this id will be refreshed after closing
    )
);
?>






