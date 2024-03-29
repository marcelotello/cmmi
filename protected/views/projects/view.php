<?php
$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Projects', 'url'=>array('index')),
	array('label'=>'Create Projects', 'url'=>array('create')),
	array('label'=>'Update Projects', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Projects', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Projects', 'url'=>array('admin')),
	array('label'=>'Add a team member', 'url'=>Yii::app()->createUrl('ProjectsRoles/create', array("id"=>$model->id))),
);
?>

<h1>View Projects #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'code',
		'description',
		'departmentsIdFK.description',
		array(
		'name'=>'iscandidate',
		'label'=>'Candidate',
		'value'=>Lookup::itemCandidate($model->iscandidate),
		),
		'start_date',
		'end_date',
		array(
		'name'=>'isactive',
		'label'=>'Active',
		'value'=>Lookup::itemStatus($model->isactive),
		),
	),
)); ?>
<br></br>
<h2> Project Team </h2>
	<?php
		foreach ($model->user_roles as $user_rol)
			{
				echo '<b>'.$user_rol->rolesIdFK->description.'</b>: '.$user_rol->usersIdFK->username.'<br>';
			}
	?>
