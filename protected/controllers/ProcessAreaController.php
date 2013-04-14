<?php

class ProcessAreaController extends Controller
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
				'actions'=>array('index','view','view_description'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','dynamicprocessareas'),
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
	
	 EQuickDlgs::render('view',array('model'=>$this->loadModel($id)));
	 
		//$this->render('view',array(	'model'=>$this->loadModel($id),	));
	}
	
	public function actionView_Description($id)
	{
		$this->render('view_description',array(
			'model'=>$this->loadModel($id),
		));
		
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ProcessArea;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProcessArea']))
		{
			$model->attributes=$_POST['ProcessArea'];
			if($model->save())
			
			EQuickDlgs::checkDialogJsScript();
            $this->redirect(array('admin'));
				//$this->redirect(array('view','id'=>$model->id));
		}
		EQuickDlgs::render('create',array('model'=>$model));
		//$this->render('create',array(			'model'=>$model,		));
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

		if(isset($_POST['ProcessArea']))
		{
			$model->attributes=$_POST['ProcessArea'];
			if($model->save())
			EQuickDlgs::checkDialogJsScript();
            $this->redirect(array('admin','id'=>$model->id));
				//$this->redirect(array('view','id'=>$model->id));
		}
		EQuickDlgs::render('update',array('model'=>$model));
		//$this->render('update',array(		'model'=>$model,		));
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
		$dataProvider=new CActiveDataProvider('ProcessArea');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ProcessArea('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ProcessArea']))
			$model->attributes=$_GET['ProcessArea'];

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
		$model=ProcessArea::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='process-area-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	 public function actionOneRowspan()
    {
        $dp = new CActiveDataProvider('ProcessArea', array(
            'sort'=>array(
                'attributes'=>array(
                      'process_area_category_id_FK',
                 ),
                 'defaultOrder' => 'process_area_category_id_FK',  
            ),
            'pagination' => array(
              'pagesize' => 30,
            ),
        )); 
        
        $this->render('onerowspan', array('dp' => $dp));
    } 
	public function actionDynamicProcessAreas()
{

   
	$category = $_POST['ReviewTaskCoverage']['process_area_category_id_FK'];
	
    echo CHtml::tag('option',
                   array('value'=>'22'),CHtml::encode($name),true);
				   
				   
    //$data=ProcessArea::model()->findAll('process_area_category_id_FK=:parent_id', 
      //            array(':parent_id'=>(int) $category));
	  
	  $data=ProcessArea::model()->findAll();
      
 
    $data=CHtml::listData($data,'id','description');
    foreach($data as $value=>$name)
    {
        echo CHtml::tag('option',
                   array('value'=>$value),CHtml::encode($name),true);
    }
}
	
}
