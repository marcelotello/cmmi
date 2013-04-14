<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'process-area-category-form',
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
		<?php echo $form->labelEx($model,'hexcolor'); ?>
		<?php echo $form->dropDownList($model,'hexcolor',Lookup::Items('color_codes')); ?>
		<?php echo $form->error($model,'hexcolor'); ?>
	</div>

	
	<div class="row">
	<?php 
	$this->widget('application.extensions.colorpicker.EColorPicker', 
              array(
                    'name'=>'hexcolor',
                    'mode'=>'textfield',
                    'fade' => false,
                    'slide' => false,
                    'curtain' => true,
                   )
             );
	
	?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->