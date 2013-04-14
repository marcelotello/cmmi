<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	

	<div class="row">
		<?php echo $form->label($model,'process_area_category_id_FK'); ?>
		<?php echo $form->dropDownList($model,'process_area_category_id_FK',ProcessAreaCategory::getCategories(),array('empty'=>'Select a Category')); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'review_tasks_id_FK'); ?>
		<?php echo $form->dropDownList($model,'review_tasks_id_FK',ReviewTasks::getReviewTasks(),array('empty'=>'Select a review task')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'specific_goals_id_FK'); ?>
		<?php echo $form->dropDownList($model,'specific_goals_id_FK',SpecificGoals::getSpecificGoals(),array('empty'=>'Select a Specific Goal')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'process_area_id_FK'); ?>
		<?php echo $form->dropDownList($model,'process_area_id_FK',ProcessArea::getProcessAreas(),array('empty'=>'Select a Process area')); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->