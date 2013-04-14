<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'review-tasks-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isactive'); ?>
		<?php echo $form->dropDownList($model,'isactive',Lookup::items('active_status')); ?>
		<?php echo $form->error($model,'isactive'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'review_types_id_FK'); ?>
		<?php echo $form->dropDownList($model,'review_types_id_FK',ReviewTypes::getReviewTypes()); ?>
		<?php echo $form->error($model,'review_types_id_FK'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'long_description'); ?>
		<?php echo $form->textArea($model,'long_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'long_description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->