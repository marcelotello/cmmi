<?php
$this->breadcrumbs=array(
	'Review Tasks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ReviewTasks', 'url'=>array('index')),
	array('label'=>'Create ReviewTasks', 'url'=>array('create')),
	array('label'=>'Update ReviewTasks', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ReviewTasks', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ReviewTasks', 'url'=>array('admin')),
);
?>

<h1>View ReviewTasks #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'code',
		'description',
		array(
		'name'=>'isactive',
		'header'=>'Active',
		'value'=>'Lookup::itemActive($data->isactive)',
		),
		'review_types.description',
		'long_description',
	),
)); ?>
<p>
Open contact form of a Yii skeleton app
</p>
<p>
    <?php $this->widget('ext.popup.JPopupWindow', array(
        'tagName'=>'button',
        'content'=>'open contact form',
        'url'=>array('/site/contact'),        
        'options'=>array(
            'height'=>500,
            'width'=>800,
            'centerScreen'=>1,
        ),
    )); ?><!-- popup -->
</p>
<h1>popup window</h1>
<p>
Open yahoo.com in a popup window (800x500) positioned 50 pixels from the
top and left side of the screen.
</p>
<p>
    <?php $this->widget('ext.popup.JPopupWindow', array(
        'content'=>'open popup',
        'url'=>"http://www.yahoo.com",        
        'htmlOptions'=>array('title'=>"yahoo.com"),
        'options'=>array(
            'height'=>500,
            'width'=>800,
            'top'=>50,
            'left'=>50,
        ),
    )); ?><!-- popup -->
</p>