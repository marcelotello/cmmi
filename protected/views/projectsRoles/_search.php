<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	

	<div class="row">
		<?php echo $form->label($model,'users_id_FK'); ?>
		<?php echo $form->dropDownList($model,'users_id_FK',User::getUsers()); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'roles_id_FK'); ?>
		<?php echo $form->dropDownList($model,'roles_id_FK',Roles::getRoles()); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'projects_id_FK'); ?>
		<?php echo $form->dropDownList($model,'projects_id_FK',Projects::getProjects()); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->