<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

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
		<?php echo $form->label($model,'evidence_url'); ?>
		<?php echo $form->textField($model,'evidence_url',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'projects_id_FK'); ?>
		<?php echo $form->dropDownList($model,'projects_id_FK',Projects::getProjects()); ?>
		<?php echo $form->error($model,'projects_id_FK'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->