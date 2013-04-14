<?php

/**
 * This is the model class for table "projects_reviews".
 *
 * The followings are the available columns in table 'projects_reviews':
 * @property string $id
 * @property string $review_date
 * @property integer $state
 * @property string $real_review_date
 * @property string $evidence_url
 * @property string $notes
 * @property string $projects_id_FK
 * @property string $review_tasks_coverage_id_FK
 *
 * The followings are the available model relations:
 * @property ReviewTasks $reviewTasksIdFK
 * @property Projects $projectsIdFK
 */
class ProjectsReviews extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProjectsReviews the static model class
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
		return 'projects_reviews';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('projects_id_FK, review_tasks_coverage_id_FK', 'required'),
			array('state', 'numerical', 'integerOnly'=>true),
			array('evidence_url', 'length', 'max'=>255),
			array('projects_id_FK, review_tasks_coverage_id_FK', 'length', 'max'=>10),
			array('review_date, real_review_date, notes', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, review_date, state, real_review_date, evidence_url, notes, projects_id_FK, review_tasks_coverage_id_FK', 'safe', 'on'=>'search'),
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
			'reviewTasksIdFK' => array(self::BELONGS_TO, 'ReviewTaskCoverage', 'review_tasks_coverage_id_FK'),
			'projectsIdFK' => array(self::BELONGS_TO, 'Projects', 'projects_id_FK'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'review_date' => 'Review Date',
			'state' => 'State',
			'real_review_date' => 'Real Review Date',
			'evidence_url' => 'Evidence Url',
			'notes' => 'Notes',
			'projects_id_FK' => 'Project',
			'review_tasks_coverage_id_FK' => 'Review Coverage',
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
		$criteria->compare('review_date',$this->review_date,true);
		$criteria->compare('state',$this->state);
		$criteria->compare('real_review_date',$this->real_review_date,true);
		$criteria->compare('evidence_url',$this->evidence_url,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('projects_id_FK',$this->projects_id_FK,true);
		$criteria->compare('review_tasks_coverage_id_FK',$this->review_tasks_coverage_id_FK,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function getStatusColor() {
        
        $statuscolor='white';
        switch ($this->state) {
            case 0:
                $statuscolor='grey';
                break;
            case 1:
                $statuscolor='green';
                break;
            case 2:
                $statuscolor='red';
                break;
            case 3:
                $statuscolor='orange';
                break;       
        }
        return $statuscolor;
        
    }
}