<?php
$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1><?php echo 'Dashboard ' ?></h1>

<?php $this->widget('DWidget', array('portlets' => $portlets)); ?>