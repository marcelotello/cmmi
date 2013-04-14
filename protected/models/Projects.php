<?php

/**
 * This is the model class for table "projects".
 *
 * The followings are the available columns in table 'projects':
 * @property string $id
 * @property string $departments_id_FK
 * @property string $code
 * @property string $description
 * @property integer $iscandidate
 * @property string $start_date
 * @property string $end_date
 * @property integer $isactive
 *
 * The followings are the available model relations:
 * @property Departments $departmentsIdFK
 * @property ProjectsRoles[] $projectsRoles
 */
class Projects extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Projects the static model class
	 */
	const PROJECT_ACTIVE=1;
	const PROJECT_NOT_ACTIVED=0;
	const PROJECT_CANDIDATE=1;
	const PROJECT_NOT_CANDIDATE=0;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'projects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('departments_id_FK, code, description, iscandidate,isactive', 'required'),
			array('iscandidate, isactive', 'numerical', 'integerOnly'=>true),
			array('departments_id_FK', 'length', 'max'=>10),
			array('code', 'length', 'max'=>20),
			array('description', 'length', 'max'=>255),
			array('start_date, end_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, departments_id_FK, code, description, iscandidate, start_date, end_date, isactive', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'departmentsIdFK' => array(self::BELONGS_TO, 'Departments', 'departments_id_FK'),
			'roles' => array(self::MANY_MANY, 'Roles', 'projects_roles(projects_id_FK,roles_id_FK)'),
			'users' => array(self::MANY_MANY, 'User', 'projects_roles(projects_id_FK,users_id_FK)'),
			'user_roles'=>array(self::HAS_MANY, 'ProjectsRoles', 'projects_id_FK'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'departments_id_FK' => 'Departments Id Fk',
			'code' => 'Code',
			'description' => 'Project description',
			'iscandidate' => 'Iscandidate',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'isactive' => 'Isactive',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('departments_id_FK',$this->departments_id_FK,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('iscandidate',$this->iscandidate);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('isactive',$this->isactive);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function getProjectsStatus()
	{
		 return CHtml::listData(Projects::model()->findAll(),'id','description');
		 $array_status = array('Pending','Passed');
		 return ($array_status);
		 var_dump ($array_status);
	}
	public static function getProjects()
	{
		 return CHtml::listData(Projects::model()->findAll(),'id','description');
		
	}
	public static function getProjectsCodes()
	{
		 
		 $sqlcommand = "select projects.code as CODE from projects order by code";
		 $command = Yii::app()->db->createCommand($sqlcommand)->queryAll();
				$count=0;
				$array_projects="";
				foreach ($command as $data)
				{
						$array_projects[$count] = $data['CODE'];
						$count=$count+1;
				}
		return $array_projects;
	}
	
	public static function getPortlet_status()
	{
		 $sqlcommand = "select projects.id AS ID,projects.code as CODE from projects order by code";
		 $command = Yii::app()->db->createCommand($sqlcommand)->queryAll();
			
				$count_project=0;
				$array_status="";
				$array_graph="";
				foreach ($command as $data)
				{
				
						//0-PENDING
						$sqlcommand_pe = "select count(*) as PENDING
										from projects_reviews
										where projects_reviews.projects_id_FK = ".$data['ID']
										.' and state = 0';
						$command_pe = Yii::app()->db->createCommand($sqlcommand_pe)->queryRow();
						$array_status[$count_project][0]=(int)$command_pe['PENDING'];
						//1-PASSED
						$sqlcommand_pa = "select count(*) as PASSED
										from projects_reviews
										where projects_reviews.projects_id_FK = ".$data['ID']
										.' and state = 1';

						$command_pa = Yii::app()->db->createCommand($sqlcommand_pa)->queryRow();
						$array_status[$count_project][1]=(int)$command_pa['PASSED'];
						//2-NOT PASSED
						$sqlcommand_np = "select count(*) as NOT_PASSED
										from projects_reviews
										where projects_reviews.projects_id_FK = ".$data['ID']
										.' and state = 2';

						$command_np = Yii::app()->db->createCommand($sqlcommand_np)->queryRow();
						$array_status[$count_project][2]=(int)$command_np['NOT_PASSED'];
						// 3-PENDING INFORMATION
						$sqlcommand_pi = "select count(*) as PENDING_INFORMATION
										from projects_reviews
										where projects_reviews.projects_id_FK = ".$data['ID']
										.' and state = 3';

						$command_pi = Yii::app()->db->createCommand($sqlcommand_pi)->queryRow();
						
						$array_status[$count_project][3]=(int) $command_pi['PENDING_INFORMATION'];
						$count_project = $count_project +1;
						
						
				}
				
		  
			  for ($p=0;$p<count($command);$p++)
			  {
				$array_pe[$p]=$array_status[$p][0];
				$array_pa[$p]=$array_status[$p][1];
				$array_np[$p]=$array_status[$p][2];
				$array_pi[$p]=$array_status[$p][3];
				
			  }
			
		   
		  
		   $array_graph=array(array('name'=>'Pending','data'=>$array_pe),
							  array('name'=>'Passed','data'=>$array_pa),
							  array('name'=>'Not Passed','data'=>$array_np),
							  array('name'=>'Pending Inf.','data'=>$array_pi));
	
		
		return $array_graph;
	}
	
	
	
	
}