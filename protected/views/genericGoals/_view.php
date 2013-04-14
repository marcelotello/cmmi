<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->code), array('view', 'id'=>$data->id)); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?><br>
	
	&nbsp<br>
	<b><u><?php echo CHtml::encode('Generic Practices'); ?></u></b>
	
	<?php
		foreach ($data->genericPractices as $gp){
		echo '<br>&nbsp&nbsp  '.$gp->code.'-'.$gp->description.'<br>';
		}
	?>
	

	

</div>