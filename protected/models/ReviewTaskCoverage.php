<?php

/**
 * This is the model class for table "review_task_coverage".
 *
 * The followings are the available columns in table 'review_task_coverage':
 * @property string $id
 * @property string $review_tasks_id_FK
 * @property string $description
 * @property string $specific_goals_id_FK
 * @property string $process_area_id_FK
 * @property string $process_area_category_id_FK
 *
 * The followings are the available model relations:
 * @property ReviewTasks $reviewTasksIdFK
 * @property SpecificGoals $specificGoalsIdFK
 * @property ProcessArea $processAreaIdFK
 * @property ProcessAreaCategory $processAreaCategoryIdFK
 */
class ReviewTaskCoverage extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ReviewTaskCoverage the static model class
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
		return 'review_task_coverage';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('review_tasks_id_FK, description', 'required'),
			array('review_tasks_id_FK, specific_goals_id_FK, process_area_id_FK, process_area_category_id_FK', 'length', 'max'=>10),
			array('description', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, review_tasks_id_FK, description, specific_goals_id_FK, process_area_id_FK, process_area_category_id_FK', 'safe', 'on'=>'search'),
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
			'reviewTask' => array(self::BELONGS_TO, 'ReviewTasks', 'review_tasks_id_FK'),
			'specificGoal' => array(self::BELONGS_TO, 'SpecificGoals', 'specific_goals_id_FK'),
			'processArea' => array(self::BELONGS_TO, 'ProcessArea', 'process_area_id_FK'),
			'processAreaCategory' => array(self::BELONGS_TO, 'ProcessAreaCategory', 'process_area_category_id_FK'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'review_tasks_id_FK' => 'Review Tasks Id Fk',
			'description' => 'Description',
			'specific_goals_id_FK' => 'Specific Goals Id Fk',
			'process_area_id_FK' => 'Process Area Id Fk',
			'process_area_category_id_FK' => 'Process Area Category Id Fk',
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
		$criteria->compare('review_tasks_id_FK',$this->review_tasks_id_FK,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('specific_goals_id_FK',$this->specific_goals_id_FK,true);
		$criteria->compare('process_area_id_FK',$this->process_area_id_FK,true);
		$criteria->compare('process_area_category_id_FK',$this->process_area_category_id_FK,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'process_area_category_id_FK ASC',
			),
			'pagination'=>array('pageSize'=>20),
		));
	}
	
	public static function getReviewTaskCoverages()
	{
		 return CHtml::listData(ReviewTaskCoverage::model()->findAll(),'id','description');
		
	}
	
}