<?php

class CalendarController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index',),
				'users'=>array('*'),
			)
		);
	}

	
	
	
	

	

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
	
		$sqlcommand = "SELECT RTA.CODE AS RTACODE,PJR.ID AS ID_PJR,REVIEW_DATE AS START_DATE,STATE,REAL_REVIEW_DATE,EVIDENCE_URL,NOTES,RTA.DESCRIPTION AS TITLE,PJ.CODE,PAC.HEXCOLOR 
								FROM PROJECTS_REVIEWS PJR,
									 PROJECTS PJ,
									 REVIEW_TASKS RTA,
									 REVIEW_TASK_COVERAGE RTC,
									 PROCESS_AREA_CATEGORY PAC
								WHERE PJR.PROJECTS_ID_FK = PJ.ID 
								  AND RTC.ID = PJR.REVIEW_TASKS_COVERAGE_ID_FK
								  AND RTC.REVIEW_TASKS_ID_FK = RTA.ID
								  AND RTC.PROCESS_AREA_CATEGORY_ID_FK = PAC.ID
								  ORDER BY PJR.REVIEW_DATE";
								  
				$command = Yii::app()->db->createCommand($sqlcommand)->queryAll();
				$count=0;
				foreach ($command as $data)
				{
					$array_calendar[$count] = array (
											'title'=> $data['RTACODE'].'('.$data['CODE'].')',
											'start'=> $data['START_DATE'].' 08:00:00',
											'allDay'=>true,
											'backgroundColor'=>$data['HEXCOLOR'],
											'textColor'=>'white',
											'editable'=>true,
												);
					$count=$count+1;
				}
				//var_dump($array_calendar);
				
		
	
		
		
		$this->render('index',array(
			'array_calendar'=>$array_calendar,
		));
	}

	

	
}
