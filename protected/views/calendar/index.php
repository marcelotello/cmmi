<?php
$this->pageTitle=Yii::app()->name . ' - Calendar';
$this->breadcrumbs=array(
	'Calendar',
);
?>
<h1>Calendar</h1>


<?php
//	var_dump($data);
 
$this->widget('ext.fullcalendar.FullcalendarGraphWidget', 
    array(
		
         'data'=>$array_calendar,
		
        
        'options'=>array(
            'editable'=>true,
			'alldaydefault'=>false,
			'header'=>array(
			'left'=>'prev,next today',
			'center'=>'title',
			'right'=>'month,agendaWeek,agendaDay'
		)),
       
        'htmlOptions'=>array(
               'class'=>'cal_theme',
			   'style'=>'width:910px;margin: 0 auto;'
        ),
    )
);

?>
<br />
