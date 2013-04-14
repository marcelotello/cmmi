<?php
if($flashes = Yii::app()->user->getFlashes()) {
    foreach($flashes as $key => $message) {
        if($key != 'counters') {
            $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
                        'id'=>$key,
                        'options'=>array(
                            'show' => 'blind',
                            'hide' => 'explode',
                            'modal' => 'true',
                            'title' => $message['title'],
                            'autoOpen'=>true,
                            ),
                        ));
 
            printf('<span class="dialog">%s</span>', $message['content']);
 
            $this->endWidget('zii.widgets.jui.CJuiDialog');
        }
    }
}
?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'mydialog',
    // additional javascript options for the dialog plugin
   'options'=>array(
                            'show' => 'blind',
                            'hide' => 'explode',
                            'modal' => 'true',
                            'title' => 'Titulo',
                            'autoOpen'=>false,
    ),
));
echo 'dialog content here';

$this->endWidget('zii.widgets.jui.CJuiDialog');

// the link that may open the dialog
echo CHtml::link('open dialog', '#', array(
   'onclick'=>'$("#mydialog").dialog("open"); return false;',
));
?>