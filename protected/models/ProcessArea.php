<?php

/**
 * This is the model class for table "process_area".
 *
 * The followings are the available columns in table 'process_area':
 * @property string $id
 * @property string $code
 * @property string $description
 * @property string $purpose_statement
 * @property string $introductory_notes
 * @property string $maturity_level_id_FK
 * @property string $process_area_category_id_FK
 */
class ProcessArea extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProcessArea the static model class
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
		return 'process_area';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code, purpose_statement, maturity_level_id_FK, process_area_category_id_FK,description','required'),
			array('code, maturity_level_id_FK,process_area_category_id_FK' ,'length', 'max'=>10),
			array('purpose_statement', 'length', 'max'=>255),
			array('introductory_notes', 'length', 'max'=>5000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array(' code, purpose_statement, maturity_level_id_FK,process_area_category_id_FK', 'safe', 'on'=>'search'),
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
		'maturity_level'=>array(self::BELONGS_TO,'maturityLevel','maturity_level_id_FK'),
		'category'=>array(self::BELONGS_TO,'processAreaCategory','process_area_category_id_FK')
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
			'description'=>'Description',
			'purpose_statement' => 'Purpose statement',
			'maturity_level_id_FK' => 'Maturity Level',
			'introductory_notes'=>'Introductory notes',
			'process_area_category_id_FK' => 'Category',
			
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

	//	$criteria->compare('id',$this->id,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('purpose_statement',$this->purpose_statement,true);
		$criteria->compare('maturity_level_id_FK',$this->maturity_level_id_FK,true);
		$criteria->compare('process_area_category_id_FK',$this->process_area_category_id_FK,true);
		$criteria->order = 'process_area_category_id_FK';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>20),
		));
	}
	
	public static function getProcessAreas()
	{
		 return CHtml::listData(ProcessArea::model()->findAll(),'id','description','code');
		
	}
}