<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'projects-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'departments_id_FK'); ?>
		<?php echo $form->dropDownList($model,'departments_id_FK',Departments::getDepartments()); ?>
		<?php echo $form->error($model,'departments_id_FK'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'iscandidate'); ?>
		<?php echo $form->dropDownList($model,'iscandidate',Lookup::items('candidate_status')); ?>

		<?php echo $form->error($model,'iscandidate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_date'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
		array(
		'model'=>$model,
		'attribute'=>'start_date',
		'language'=>'en',
	    // additional javascript options for the date picker plugin
		'options'=>array(
		'dateFormat'=>'yy-mm-dd',
		'constrainImput'=>'false',
		'duration'=>'fast',
        'showAnim'=>'slide',
		),
		'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
));?>
		<?php echo $form->error($model,'start_date'); ?>
	</div>
	
	


	<div class="row">
		<?php echo $form->labelEx($model,'end_date'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
		array(
		'model'=>$model,
		'attribute'=>'end_date',
		'language'=>'en',
	    // additional javascript options for the date picker plugin
		'options'=>array(
		'dateFormat'=>'yy-mm-dd',
		'constrainImput'=>'false',
		'duration'=>'fast',
        'showAnim'=>'slide',
		),
		'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
));?>
		<?php echo $form->error($model,'end_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isactive'); ?>
		<?php echo $form->dropDownList($model,'isactive',Lookup::items('active_status')); ?>
		<?php echo $form->error($model,'isactive'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->