<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->code), array('view', 'id'=>$data->id)); ?>
	<br />

	


	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('departments_id_FK')); ?>:</b>
	<?php echo CHtml::encode($data->departmentsIdFK->description); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('iscandidate')); ?>:</b>
	<?php echo CHtml::encode(Lookup::itemCandidate($data->iscandidate)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_date')); ?>:</b>
	<?php echo CHtml::encode($data->start_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end_date')); ?>:</b>
	<?php echo CHtml::encode($data->end_date); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('isactive')); ?>:</b>
	<?php echo CHtml::encode(Lookup::itemUnique($data->isactive)); ?>
	<br />
	
	
	<b> Project Team </b><br>
	<?php
	foreach ($data->user_roles as $user_rol)
			{
				echo $user_rol->usersIdFK->username.' ('.$user_rol->rolesIdFK->description.')<br>';
			}
	?>
	
	
	
	<br />

	

</div>