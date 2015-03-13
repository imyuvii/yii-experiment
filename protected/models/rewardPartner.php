<?php

/**
 * This is the model class for table "registerrewardpartner".
 *
 * The followings are the available columns in table 'registerrewardpartner':
 * @property string $organizationName
 * @property string $contactNo
 * @property integer $partnerType
 * @property string $city
 * @property string $area
 * @property string $category
 * @property string $emailId
 * @property string $password
 * @property string $firstName
 * @property string $lastName
 * @property string $gender
 */
class rewardPartner extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'registerrewardpartner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('organizationName, contactNo, partnerType, city, area, category, emailId, password, firstName, lastName, gender', 'required'),
			array('partnerType', 'numerical', 'integerOnly'=>true),
			array('organizationName, contactNo, city, area, category, emailId, password, firstName, lastName, gender', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('organizationName, contactNo, partnerType, city, area, category, emailId, password, firstName, lastName, gender', 'safe', 'on'=>'search'),
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
			'organizationName' => 'Organization Name',
			'contactNo' => 'Contact No',
			'partnerType' => 'Partner Type',
			'city' => 'City',
			'area' => 'Area',
			'category' => 'Category',
			'emailId' => 'Email',
			'password' => 'Password',
			'firstName' => 'First Name',
			'lastName' => 'Last Name',
			'gender' => 'Gender',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('organizationName',$this->organizationName,true);
		$criteria->compare('contactNo',$this->contactNo,true);
		$criteria->compare('partnerType',$this->partnerType);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('emailId',$this->emailId,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('firstName',$this->firstName,true);
		$criteria->compare('lastName',$this->lastName,true);
		$criteria->compare('gender',$this->gender,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return rewardPartner the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
