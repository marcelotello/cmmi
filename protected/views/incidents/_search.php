<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_response_id_FK'); ?>
		<?php echo $form->textField($model,'user_response_id_FK'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'projects_reviews_id_FK'); ?>
		<?php echo $form->textField($model,'projects_reviews_id_FK',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'incident_description'); ?>
		<?php echo $form->textField($model,'incident_description',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'corrective_action'); ?>
		<?php echo $form->textField($model,'corrective_action',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'incident_date'); ?>
		<?php echo $form->textField($model,'incident_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'incident_response'); ?>
		<?php echo $form->textField($model,'incident_response',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_response'); ?>
		<?php echo $form->textField($model,'date_response'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->