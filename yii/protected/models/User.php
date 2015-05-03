<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $user_id
 * @property string $user_username
 * @property string $user_password
 * @property string $user_full_name
 * @property string $user_type
 * @property integer $user_active
 * @property string $created_time
 * @property integer $created_user_id
 * @property string $modified_time
 * @property integer $modified_user_id
 */
class User extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_username, user_password, user_full_name, user_type, user_active', 'required'),
            array('user_active, created_user_id, modified_user_id', 'numerical', 'integerOnly' => true),
            array('user_username', 'length', 'max' => 45),
            array('user_full_name', 'length', 'max' => 255),
            array('user_type', 'length', 'max' => 5),
            array('created_time, modified_time', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('user_id, user_username, user_password, user_full_name, user_type, user_active, created_time, created_user_id, modified_time, modified_user_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'user_id' => 'ID',
            'user_username' => 'Username',
            'user_password' => 'Password',
            'user_full_name' => 'Full Name',
            'user_type' => 'Type',
            'user_active' => 'Active',
            'created_time' => 'Created Time',
            'created_user_id' => 'Created User',
            'modified_time' => 'Modified Time',
            'modified_user_id' => 'Modified User',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('user_username', $this->user_username, true);
        $criteria->compare('user_password', $this->user_password, true);
        $criteria->compare('user_full_name', $this->user_full_name, true);
        $criteria->compare('user_type', $this->user_type, true);
        $criteria->compare('user_active', $this->user_active);
        $criteria->compare('created_time', $this->created_time, true);
        $criteria->compare('created_user_id', $this->created_user_id);
        $criteria->compare('modified_time', $this->modified_time, true);
        $criteria->compare('modified_user_id', $this->modified_user_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
