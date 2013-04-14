<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'related-areas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_process_area'); ?>
		<?php echo $form->textField($model,'id_process_area',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_process_area'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Process_Area_id_FK'); ?>
		<?php echo $form->textField($model,'Process_Area_id_FK',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Process_Area_id_FK'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->