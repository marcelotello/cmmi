<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'review-task-coverage-form',
	'enableAjaxValidation'=>true,
	
)); ?>
<?php CHtml::activeId($model,'process_area_id_FK' ) ?>


	<p class="note">Fields with <span class="required">*</span> are required.</p>
		<?php echo $form->labelEx($model,'process_area_category_id_FK'); ?>
	  <?php echo $form->dropDownList($model,'process_area_category_id_FK', CHtml::listData(ProcessAreaCategory::model()->findAll(array('order' => 'description ASC')), 'id', 'description'),                                   
                                                                        array(
                                                                                'ajax' => array(
                                                                                'type'=>'POST',
                                                                                'url'=>CController::createUrl('ReviewTaskCoverage/dynamicProcessAreas'),
                                                                                'update'=>'#'.CHtml::activeId($model,'process_area_id_FK'
                                                                        )
                                                        ),'prompt' => ''
                                                )); ?>
	 
	

	<div class="row">
		<?php echo $form->labelEx($model,'process_area_id_FK'); ?>
		 <?php echo $form->dropDownList($model,'process_area_id_FK',array()); ?>
		<?php echo $form->error($model,'process_area_id_FK'); ?>
	</div>

	
		
	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'review_tasks_id_FK'); ?>
		<?php echo $form->dropDownList($model,'review_tasks_id_FK',ReviewTasks::getReviewTasks(),array('empty'=>'Select a review task')); ?>
		<?php echo $form->error($model,'review_tasks_id_FK'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'specific_goals_id_FK'); ?>
		<?php echo $form->dropDownList($model,'specific_goals_id_FK',SpecificGoals::getSpecificGoals(),array('empty'=>'Select a Specific Goal')); ?>
		<?php echo $form->error($model,'specific_goals_id_FK'); ?>
	</div>



	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->