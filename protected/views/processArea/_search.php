<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	

	<div class="row">
		<?php echo $form->label($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>10,'maxlength'=>10)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>50,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'purpose_statement'); ?>
		<?php echo $form->textField($model,'purpose_statement',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'maturity_level_id_FK'); ?>
		<?php echo $form->textField($model,'maturity_level_id_FK',array('size'=>10,'maxlength'=>10)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'process_area_category_id_FK'); ?>
		<?php echo $form->textField($model,'process_area_category_id_FK',array('size'=>10,'maxlength'=>10)); ?>
	</div>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->