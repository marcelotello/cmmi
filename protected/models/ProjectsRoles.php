<?php

/**
 * This is the model class for table "projects_roles".
 *
 * The followings are the available columns in table 'projects_roles':
 * @property integer $users_id_FK
 * @property string $roles_id_FK
 * @property string $projects_id_FK
 *
 * The followings are the available model relations:
 * @property Roles $rolesIdFK
 * @property Projects $projectsIdFK
 * @property Users $usersIdFK
 */
class ProjectsRoles extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProjectsRoles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'projects_roles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('users_id_FK, roles_id_FK, projects_id_FK', 'required'),
			array('users_id_FK', 'numerical', 'integerOnly'=>true),
			array('roles_id_FK, projects_id_FK', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('users_id_FK, roles_id_FK, projects_id_FK', 'safe', 'on'=>'search'),
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
			'rolesIdFK' => array(self::BELONGS_TO, 'Roles', 'roles_id_FK'),
			'projectsIdFK' => array(self::BELONGS_TO, 'Projects', 'projects_id_FK'),
			'usersIdFK' => array(self::BELONGS_TO, 'User', 'users_id_FK'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'users_id_FK' => 'Team user',
			'roles_id_FK' => 'User rol',
			'projects_id_FK' => 'Project',
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

		$criteria->compare('users_id_FK',$this->users_id_FK);
		$criteria->compare('roles_id_FK',$this->roles_id_FK,true);
		$criteria->compare('projects_id_FK',$this->projects_id_FK,true);
		$criteria->order = 'projects_id_FK';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			
		));
	}
}