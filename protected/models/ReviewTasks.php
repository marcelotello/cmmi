<?php

/**
 * This is the model class for table "review_tasks".
 *
 * The followings are the available columns in table 'review_tasks':
 * @property string $id
 * @property string $code
 * @property string $description
 * @property integer $isactive
 * @property string $review_types_id_FK
 * @property string $long_description
 */
class ReviewTasks extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ReviewTasks the static model class
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
		return 'review_tasks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code, description, review_types_id_FK', 'required'),
			array('isactive', 'numerical', 'integerOnly'=>true),
			array('code, review_types_id_FK', 'length', 'max'=>10),
			array('description', 'length', 'max'=>255),
			array('long_description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, code, description, isactive, review_types_id_FK, long_description', 'safe', 'on'=>'search'),
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
		 'review_types' => array(self::BELONGS_TO, 'ReviewTypes', 'review_types_id_FK'),
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
			'isactive' => 'Active?',
			'review_types_id_FK' => 'Review Types',
			'long_description' => 'Long Description',
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
		$criteria->compare('isactive',$this->isactive);
		$criteria->compare('review_types_id_FK',$this->review_types_id_FK,true);
		$criteria->compare('long_description',$this->long_description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function getReviewTasks()
	{
	   
		  //return CHtml::listData((ReviewTasks::model()->findAll(),'id','description');
		  return CHtml::listData(ReviewTasks::model()->findAll(),'id','description','code');
		
	}
}