<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'projects-roles-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'users_id_FK'); ?>
		<?php echo $form->dropDownList($model,'users_id_FK',User::getUsers()); ?>
		<?php echo $form->error($model,'users_id_FK'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'roles_id_FK'); ?>
		<?php echo $form->dropDownList($model,'roles_id_FK',Roles::getRoles()); ?>
		<?php echo $form->error($model,'roles_id_FK'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'projects_id_FK'); ?>
		<?php echo $form->dropDownList($model,'projects_id_FK',Projects::getProjects()); ?>
		<?php echo $form->error($model,'projects_id_FK'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->