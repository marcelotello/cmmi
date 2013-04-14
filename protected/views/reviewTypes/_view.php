<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->code), array('view', 'id'=>$data->id)); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('every_days')); ?>:</b>
	<?php echo CHtml::encode($data->every_days); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isunique')); ?>:</b>
	<?php echo CHtml::encode(Lookup::itemUnique($data->isunique)); ?>
	<br />


</div>