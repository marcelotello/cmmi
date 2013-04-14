<?php

/**
 * This is the model class for table "related_areas".
 *
 * The followings are the available columns in table 'related_areas':
 * @property string $id
 * @property string $id_process_area
 * @property string $description
 * @property string $Process_Area_id_FK
 */
class RelatedAreas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RelatedAreas the static model class
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
		return 'related_areas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description, Process_Area_id_FK', 'required'),
			array('id_process_area, Process_Area_id_FK', 'length', 'max'=>10),
			array('description', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_process_area, description, Process_Area_id_FK', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_process_area' => 'Id Process Area',
			'description' => 'Description',
			'Process_Area_id_FK' => 'Process Area Id Fk',
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
		$criteria->compare('id_process_area',$this->id_process_area,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('Process_Area_id_FK',$this->Process_Area_id_FK,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}