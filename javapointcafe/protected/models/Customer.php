<?php

/**
 * This is the model class for table "customer".
 *
 * The followings are the available columns in table 'customer':
 * @property integer $customer_id
 * @property string $customer_name
 * @property string $customer_email
 * @property string $customer_contact
 * @property string $customer_preferred_time
 * @property string $customer_instructions
 * @property integer $customer_subscribe
 * @property double $total_amount
 * @property string $confirmation_no
 * @property string $created_time
 * @property integer $order_complete
 *
 * The followings are the available model relations:
 * @property Order[] $orders
 */
class Customer extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'customer';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('customer_name, customer_email, customer_contact, customer_preferred_time, customer_subscribe, total_amount, confirmation_no, created_time', 'required'),
            array('customer_subscribe, order_complete', 'numerical', 'integerOnly' => true),
            array('total_amount', 'numerical'),
            array('customer_name, customer_contact', 'length', 'max' => 45),
            array('customer_email', 'length', 'max' => 255),
            array('customer_instructions', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('customer_id, customer_name, customer_email, customer_contact, customer_preferred_time, customer_instructions, customer_subscribe, total_amount, confirmation_no, created_time, order_complete', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'orders' => array(self::HAS_MANY, 'Order', 'order_customer_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'customer_id' => 'ID',
            'customer_name' => 'Name',
            'customer_email' => 'Email',
            'customer_contact' => 'Contact No',
            'customer_preferred_time' => 'Preferred Time',
            'customer_instructions' => 'Customer Instructions',
            'customer_subscribe' => 'Subscribed',
            'total_amount' => 'Total Amount',
            'confirmation_no' => 'Confirmation No',
            'created_time' => 'Order Time',
            'order_complete' => 'Order Complete',
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

        $criteria->compare('customer_id', $this->customer_id);
        $criteria->compare('customer_name', $this->customer_name, true);
        $criteria->compare('customer_email', $this->customer_email, true);
        $criteria->compare('customer_contact', $this->customer_contact, true);
        $criteria->compare('customer_preferred_time', $this->customer_preferred_time, true);
        $criteria->compare('customer_instructions', $this->customer_instructions, true);
        $criteria->compare('customer_subscribe', $this->customer_subscribe);
        $criteria->compare('total_amount', $this->total_amount);
        $criteria->compare('confirmation_no', $this->confirmation_no, true);
        $criteria->compare('created_time', $this->created_time, true);
        $criteria->compare('order_complete', $this->order_complete);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Customer the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
