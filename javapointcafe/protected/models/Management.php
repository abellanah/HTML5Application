<?php

/**
 * This is the model class for table "management".
 *
 * The followings are the available columns in table 'management':
 * @property integer $id
 * @property string $logo
 * @property string $story_image
 * @property string $story_desc_1
 * @property string $story_desc_2
 * @property string $story_desc_3
 * @property string $story_desc_4
 * @property string $story_desc_5
 * @property string $location_desc
 * @property string $location_map
 * @property string $location_hours
 * @property string $location_contact_no
 * @property string $location_contact_email
 */
class Management extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'management';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('story_desc_1, location_desc, location_map, location_hours, location_contact_no, location_contact_email', 'required'),
            array('logo, story_image, location_desc, location_hours, location_contact_no, location_contact_email', 'length', 'max' => 255),
            array('story_desc_2, story_desc_3, story_desc_4, story_desc_5', 'safe'),
            array('logo, story_image', 'file', 'allowEmpty' => true, 'types'=>'png'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, logo, story_image, story_desc_1, story_desc_2, story_desc_3, story_desc_4, story_desc_5, location_desc, location_map, location_hours, location_contact_no, location_contact_email', 'safe', 'on' => 'search'),
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
            'id' => 'ID',
            'logo' => 'Logo',
            'story_image' => 'Story Image',
            'story_desc_1' => 'Story Description',
            'story_desc_2' => 'Story Desc 2',
            'story_desc_3' => 'Story Desc 3',
            'story_desc_4' => 'Story Desc 4',
            'story_desc_5' => 'Story Desc 5',
            'location_desc' => 'Our Location',
            'location_map' => 'Location Google Map',
            'location_hours' => 'Open Hours',
            'location_contact_no' => 'Contact Us',
            'location_contact_email' => 'Email',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('logo', $this->logo, true);
        $criteria->compare('story_image', $this->story_image, true);
        $criteria->compare('story_desc_1', $this->story_desc_1, true);
        $criteria->compare('story_desc_2', $this->story_desc_2, true);
        $criteria->compare('story_desc_3', $this->story_desc_3, true);
        $criteria->compare('story_desc_4', $this->story_desc_4, true);
        $criteria->compare('story_desc_5', $this->story_desc_5, true);
        $criteria->compare('location_desc', $this->location_desc, true);
        $criteria->compare('location_map', $this->location_map, true);
        $criteria->compare('location_hours', $this->location_hours, true);
        $criteria->compare('location_contact_no', $this->location_contact_no, true);
        $criteria->compare('location_contact_email', $this->location_contact_email, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Management the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
