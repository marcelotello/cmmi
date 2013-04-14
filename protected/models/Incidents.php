<?php

/**
 * This is the model class for table "incidents".
 *
 * The followings are the available columns in table 'incidents':
 * @property integer $id
 * @property integer $user_response_id_FK
 * @property string $projects_reviews_id_FK
 * @property string $incident_description
 * @property string $corrective_action
 * @property string $incident_date
 * @property string $incident_response
 * @property string $date_response
 *
 * The followings are the available model relations:
 * @property Users $userResponseIdFK
 */
class Incidents extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Incidents the static model class
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
		return 'incidents';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_response_id_FK, projects_reviews_id_FK, incident_description, incident_date', 'required'),
			array('user_response_id_FK', 'numerical', 'integerOnly'=>true),
			array('projects_reviews_id_FK', 'length', 'max'=>10),
			array('incident_description, corrective_action, incident_response', 'length', 'max'=>255),
			array('date_response', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_response_id_FK, projects_reviews_id_FK, incident_description, corrective_action, incident_date, incident_response, date_response', 'safe', 'on'=>'search'),
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
			'userResponseIdFK' => array(self::BELONGS_TO, 'Users', 'user_response_id_FK'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_response_id_FK' => 'User Response Id Fk',
			'projects_reviews_id_FK' => 'Projects Reviews Id Fk',
			'incident_description' => 'Incident Description',
			'corrective_action' => 'Corrective Action',
			'incident_date' => 'Incident Date',
			'incident_response' => 'Incident Response',
			'date_response' => 'Date Response',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('user_response_id_FK',$this->user_response_id_FK);
		$criteria->compare('projects_reviews_id_FK',$this->projects_reviews_id_FK,true);
		$criteria->compare('incident_description',$this->incident_description,true);
		$criteria->compare('corrective_action',$this->corrective_action,true);
		$criteria->compare('incident_date',$this->incident_date,true);
		$criteria->compare('incident_response',$this->incident_response,true);
		$criteria->compare('date_response',$this->date_response,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}