<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('review_tasks_id_FK')); ?>:</b>
	<?php echo CHtml::encode($data->review_tasks_id_FK); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('specific_goals_id_FK')); ?>:</b>
	<?php echo CHtml::encode($data->specific_goals_id_FK); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('process_area_id_FK')); ?>:</b>
	<?php echo CHtml::encode($data->process_area_id_FK); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('process_area_category_id_FK')); ?>:</b>
	<?php echo CHtml::encode($data->process_area_category_id_FK); ?>
	<br />


</div>