<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'process-area-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validationOnSubmit'=>true,
	)
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
		<?php echo $form->textField($model,'description',array('size'=>50,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'purpose_statement'); ?>
		<?php echo $form->textarea($model,'purpose_statement',array('rows'=>6, 'cols'=>80)); ?>
		<?php echo $form->error($model,'purpose_statement'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'maturity_level_id_FK'); ?>
		<?php echo $form->dropDownList($model,'maturity_level_id_FK',MaturityLevel::getMaturityLevels()); ?>
		<?php echo $form->error($model,'maturity_level_id_FK'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'process_area_category_id_FK'); ?>
		<?php echo $form->dropDownList($model,'process_area_category_id_FK',ProcessAreaCategory::getCategories()); ?>
		<?php echo $form->error($model,'process_area_category_id_FK'); ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'introductory_notes'); ?><br />
		<?php $this->widget('ext.tinymce.ETinyMce',
			  array (
					'model'=>$model,
					'attribute'=>'introductory_notes',
					'editorTemplate'=>'full',
					'htmlOptions'=>array('rows'=>8,'cols'=>50,'class'=>'tinymce'),
					  'options' => array(
                                      'theme_advanced_buttons1' => 'undo,redo,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,outdent,          
									indent,|,advhr,|,sub,sup,|,bullist,numlist,|,formatselect,fontselect,fontsizeselect,|,cut,copy,paste,pastetext, pasteword,|,search,replace,',
									  'theme_advanced_buttons2' => 'tablecontrols,|,removeformat,visualaid,',
									  'theme_advanced_buttons3' => '',
									  'theme_advanced_buttons4' => '',
									  'theme_advanced_toolbar_location' => 'top',
									  'theme_advanced_toolbar_align' => 'left',
									  'theme_advanced_statusbar_location' => 'none',
									     'theme_advanced_font_sizes' => "10=10pt,11=11pt,12=12pt,13=13pt,14=14pt,
										  15=15pt,16=16pt,17=17pt,18=18pt,19=19pt,20=20pt",
										  )
									  
									  ));?>
		
		<?php echo $form->error($model,'introductory_notes'); ?>
	</div>
	
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->