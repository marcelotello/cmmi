<?php
class News extends DPortlet
{

  protected function renderContent()
  {
   $this->Widget('ext.highcharts.HighchartsWidget',
   array(
		'options'=>array
				(
					'title' => array('text' => 'Review Status'),
					'subtitle'=>array('text'=> 'by projects'),
					'chart' => array('type'=>'column'),
					'xAxis' => array(
										'categories' => Projects::getProjectsCodes()
									),
				  
					'yAxis' => array(
									'title' => array('text' => 'Reviews','align'=>'high'),
									'labels'=>array('overflow'=>'justify'),
									),
					'plotOptions'=>array('bar'=>array('dataLabels'=>array('enabled'=>true))),
					
					'series' => Projects::getPortlet_status(),
					'legend'=>array(
								'layout'=>'vertical',
								'align'=>'right',
								'verticalAlign'=>'top',
								'x'=>-100,
								'y'=>50,
								'floating'=>true,
								'borderWidth'=>1,
								'backgroundColor'=>'#FFFFFF',
								'shadow'=>true
								  ),
					'credits'=>array(
								'enabled'=>false),
				
								  
					
				)
		));
  }
  
  protected function getTitle()
  {
    return 'Review Status';
  }
  
  protected function getClassName()
  {
    return __CLASS__;
  }
}


