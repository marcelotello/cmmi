<div class="view">

	
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('projects_id_FK')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->projectsIdFK->description), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('users_id_FK')); ?>:</b>
	<?php echo CHtml::encode($data->usersIdFK->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('roles_id_FK')); ?>:</b>
	<?php echo CHtml::encode($data->rolesIdFK->description); ?>
	<br />

	


</div>