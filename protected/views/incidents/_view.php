<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_response_id_FK')); ?>:</b>
	<?php echo CHtml::encode($data->user_response_id_FK); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('projects_reviews_id_FK')); ?>:</b>
	<?php echo CHtml::encode($data->projects_reviews_id_FK); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('incident_description')); ?>:</b>
	<?php echo CHtml::encode($data->incident_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('corrective_action')); ?>:</b>
	<?php echo CHtml::encode($data->corrective_action); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('incident_date')); ?>:</b>
	<?php echo CHtml::encode($data->incident_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('incident_response')); ?>:</b>
	<?php echo CHtml::encode($data->incident_response); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('date_response')); ?>:</b>
	<?php echo CHtml::encode($data->date_response); ?>
	<br />

	*/ ?>

</div>