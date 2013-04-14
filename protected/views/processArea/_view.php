<div class="view">

	

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->code),array('view', 'id'=>$data->id)); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('purpose_statement')); ?>:</b>
	<?php echo CHtml::encode($data->purpose_statement); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('maturity_level_id_FK')); ?>:</b>
	<?php echo CHtml::encode($data->maturity_level->description); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('process_area_category_id_FK')); ?>:</b>
	<?php echo CHtml::encode($data->category->description); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('introductory_notes')); ?>:</b>
	<?php echo $data->introductory_notes; ?>
	<br />


</div>