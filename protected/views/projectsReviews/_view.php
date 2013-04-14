<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('review_date')); ?>:</b>
	<?php echo CHtml::encode($data->review_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode(Lookup::itemReviewStatus($data->state)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('real_review_date')); ?>:</b>
	<?php echo CHtml::encode($data->real_review_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('evidence_url')); ?>:</b>
	<?php echo CHtml::encode($data->evidence_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes')); ?>:</b>
	<?php echo CHtml::encode($data->notes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('projects_id_FK')); ?>:</b>
	<?php echo CHtml::encode($data->projectsIdFK->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('review_tasks_coverage_id_FK')); ?>:</b>
	<?php echo CHtml::encode($data->reviewTasksIdFK->description); ?>
	<br />

	 

</div>