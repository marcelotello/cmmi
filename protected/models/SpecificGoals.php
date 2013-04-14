<?php

/**
 * This is the model class for table "specific_goals".
 *
 * The followings are the available columns in table 'specific_goals':
 * @property string $id
 * @property string $code
 * @property string $description
 * @property string $process_Area_id_FK
 *
 * The followings are the available model relations:
 * @property ProcessArea $processAreaIdFK
 * @property SpecificPractices[] $specificPractices
 */
class SpecificGoals extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SpecificGoals the static model class
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
		return 'specific_goals';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code, description, process_Area_id_FK', 'required'),
			array('code, process_Area_id_FK', 'length', 'max'=>10),
			array('description', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, code, description, process_Area_id_FK', 'safe', 'on'=>'search'),
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
			'processAreaIdFK' => array(self::BELONGS_TO, 'ProcessArea', 'process_Area_id_FK'),
			'specificPractices' => array(self::HAS_MANY, 'SpecificPractices', 'specific_goals_id_FK'),
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
			'process_Area_id_FK' => 'Process Area Id Fk',
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
		$criteria->compare('process_Area_id_FK',$this->process_Area_id_FK,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function getSpecificGoals()
	{
		 return CHtml::listData(SpecificGoals::model()->findAll(),'id','description');
		
	}
}