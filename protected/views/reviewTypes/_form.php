<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'review-types-form',
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
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'every_days'); ?>
		<?php echo $form->textField($model,'every_days'); ?>
		<?php echo $form->error($model,'every_days'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isunique'); ?>
		<?php echo $form->dropDownList($model,'isunique',Lookup::items('unique_status')); ?>
		<?php echo $form->error($model,'isunique'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->