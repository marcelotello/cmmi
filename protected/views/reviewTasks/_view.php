<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->code), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isactive')); ?>:</b>
	<?php echo CHtml::encode(Lookup::itemStatus($data->isactive)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('review_types_id_FK')); ?>:</b>
	<?php echo CHtml::encode($data->review_types_id_FK); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('long_description')); ?>:</b>
	<?php echo CHtml::encode($data->long_description); ?>
	<br />


</div>