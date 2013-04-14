<?php

class ReviewTasksController extends Controller
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
		return array(
			'accessControl', // perform access control for CRUD operations
		);
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','dynamicprocessareas','GenerateReviews','generate'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ReviewTasks;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ReviewTasks']))
		{
			$model->attributes=$_POST['ReviewTasks'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ReviewTasks']))
		{
			$model->attributes=$_POST['ReviewTasks'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

		public function actionGenerate()
{
		$model=new ReviewTasks('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ReviewTasks']))
			$model->attributes=$_GET['ReviewTasks'];

		$this->render('generate',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ReviewTasks');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ReviewTasks('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ReviewTasks']))
			$model->attributes=$_GET['ReviewTasks'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=ReviewTasks::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='review-tasks-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
public function actionGenerateReviews()
	{
		
		
		 $act=$_GET['act'];
		 if($act=='generate')
		 {
		
			$autoIdAll = $_POST['chk'];
			if(count($autoIdAll)>0)
			{
				foreach($autoIdAll as $autoId)
				{
					
					//var_dump($autoIdAll);
					
					$sqlcommand = "SELECT RTA.DESCRIPTION,RTA.CODE,RTY.EVERY_DAYS,RTA.DEFAULT_REVIEWER_ID_FK,RTC.ID AS RTCID
									FROM  REVIEW_TASKS RTA,REVIEW_TASK_COVERAGE RTC, REVIEW_TYPES RTY
									WHERE  RTC.REVIEW_TASKS_ID_FK = RTA.ID
									AND   RTA.REVIEW_TYPES_ID_FK = RTY.ID
									AND   RTA.ISACTIVE=1
									AND RTA.ID = ".$autoId;
									  
					$command = Yii::app()->db->createCommand($sqlcommand)->queryAll();
					
					foreach ($command as $data)
					{
						$sqlprojects = "SELECT PJ.CODE,PJ.DESCRIPTION,PJ.ID 
										FROM PROJECTS PJ 
									WHERE  ISACTIVE=1";
						$pj_command = Yii::app()->db->createCommand($sqlprojects)->queryAll();
						foreach ($pj_command as $data_projects)
						{
								$id_task_cov   = $data['RTCID'];
								$id_revisor = $data['DEFAULT_REVIEWER_ID_FK'];
								$n_dias    = (int) $data['EVERY_DAYS'];
								$id_project = $data_projects['ID'];
								$model=new ProjectsReviews;
								$fecha_hoy = date("Y-m-d");
								$nueva_fecha = $this->suma_fechas($fecha_hoy,$n_dias);
								echo 'Fecha='.$nueva_fecha;
								echo 'Project='.$id_project;
								echo 'TC='.$id_task_cov;
								$model->review_date= $nueva_fecha;
								$model->state=0;
								$model->real_review_date= $nueva_fecha;
								$model->evidence_url='';
								$model->notes='';
								$model->projects_id_FK=$id_project;
								$model->review_tasks_coverage_id_FK=$id_task_cov;
								 if($model->save())
										echo 'success';
								 else
									 throw new Exception("Sorry",500);
						} //end foreach
						
					} //end foreach
				} //end foreach	
			} //end if
		} // end if
			
		
		
		
	}
	public function suma_fechas($fecha,$ndias)
            
	{
            
      if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/",$fecha))
	  {
            $split=explode("/", $fecha);
		
      }
	  
	  if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/",$fecha))
		{
			$split=explode("-", $fecha);
		}
		$año=$split[0];
		$mes=$split[1];
		$dia=$split[2];

        $nueva = mktime(0,0,0, $mes,$dia,$año) + $ndias * 24 * 60 * 60;
        $nuevafecha=date("Y-m-d",$nueva);
      return ($nuevafecha);  
            
	}
	
}
