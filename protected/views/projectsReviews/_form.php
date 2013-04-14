<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'projects-reviews-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'review_date'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
		array(
		'model'=>$model,
		'attribute'=>'review_date',
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
		<?php echo $form->error($model,'review_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->dropDownList($model,'state',Lookup::items('review_status')); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	
	
	<div class="row">
		<?php echo $form->labelEx($model,'real_review_date'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
		array(
		'model'=>$model,
		'attribute'=>'real_review_date',
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
		<?php echo $form->error($model,'real_review_date'); ?>
	</div>
	
	

	<div class="row">
		<?php echo $form->labelEx($model,'evidence_url'); ?>
		<?php echo $form->textField($model,'evidence_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'evidence_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'notes'); ?>
		<?php echo $form->textArea($model,'notes',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'notes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'projects_id_FK'); ?>
		<?php echo $form->dropDownList($model,'projects_id_FK',Projects::getProjects()); ?>
		<?php echo $form->error($model,'projects_id_FK'); ?>
	</div>
	
		

	<div class="row">
		<?php echo $form->labelEx($model,'review_tasks_coverage_id_FK'); ?>
		<?php echo $form->dropDownList($model,'review_tasks_coverage_id_FK',ReviewTaskCoverage::getReviewTaskCoverages()); ?>
		<?php echo $form->error($model,'review_tasks_coverage_id_FK'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->