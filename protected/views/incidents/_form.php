<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'incidents-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_response_id_FK'); ?>
		<?php echo $form->textField($model,'user_response_id_FK'); ?>
		<?php echo $form->error($model,'user_response_id_FK'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'projects_reviews_id_FK'); ?>
		<?php echo $form->textField($model,'projects_reviews_id_FK',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'projects_reviews_id_FK'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'incident_description'); ?>
		<?php echo $form->textField($model,'incident_description',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'incident_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'corrective_action'); ?>
		<?php echo $form->textField($model,'corrective_action',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'corrective_action'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'incident_date'); ?>
		<?php echo $form->textField($model,'incident_date'); ?>
		<?php echo $form->error($model,'incident_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'incident_response'); ?>
		<?php echo $form->textField($model,'incident_response',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'incident_response'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_response'); ?>
		<?php echo $form->textField($model,'date_response'); ?>
		<?php echo $form->error($model,'date_response'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->