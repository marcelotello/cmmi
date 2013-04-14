<?php

/**
 * This is the model class for table "generic_practices".
 *
 * The followings are the available columns in table 'generic_practices':
 * @property string $id
 * @property string $code
 * @property string $description
 * @property string $generic_goals_id_FK
 *
 * The followings are the available model relations:
 * @property GenericPracticeElaboration[] $genericPracticeElaborations
 * @property GenericGoals $genericGoalsIdFK
 * @property GenericSubpractices[] $genericSubpractices
 * @property ProjectsReviews[] $projectsReviews
 */
class GenericPractices extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GenericPractices the static model class
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
		return 'generic_practices';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code, description, generic_goals_id_FK', 'required'),
			array('code, generic_goals_id_FK', 'length', 'max'=>10),
			array('description', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, code, description, generic_goals_id_FK', 'safe', 'on'=>'search'),
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
			'genericPracticeElaborations' => array(self::HAS_MANY, 'GenericPracticeElaboration', 'generic_practices_id_FK'),
			'genericGoalsIdFK' => array(self::BELONGS_TO, 'GenericGoals', 'generic_goals_id_FK'),
			'genericSubpractices' => array(self::HAS_MANY, 'GenericSubpractices', 'generic_practices_id_FK'),
			'projectsReviews' => array(self::HAS_MANY, 'ProjectsReviews', 'generic_practices_id_FK'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'code' => 'Code',
			'description' => 'Description',
			'generic_goals_id_FK' => 'Generic Goals',
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
		$criteria->compare('code',$this->code,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('generic_goals_id_FK',$this->generic_goals_id_FK,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}