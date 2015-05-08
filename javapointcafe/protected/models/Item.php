<?php

/**
 * This is the model class for table "item".
 *
 * The followings are the available columns in table 'item':
 * @property integer $item_id
 * @property string $item_description
 * @property string $item_image
 * @property double $item_price
 * @property integer $subcategory_id
 *
 * The followings are the available model relations:
 * @property Subcategory $subcategory
 * @property Order[] $orders
 */
class Item extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('item_description, item_price', 'required'),
			array('subcategory_id', 'numerical', 'integerOnly'=>true),
			array('item_price', 'numerical'),
			array('item_description', 'length', 'max'=>255),
			array('item_image', 'safe'),
//			array('item_image', 'file', 'allowEmpty' => true,'types'=>'jpg png'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('item_id, item_description, item_image, item_price, subcategory_id', 'safe', 'on'=>'search'),
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
			'subcategory' => array(self::BELONGS_TO, 'Subcategory', 'subcategory_id'),
			'orders' => array(self::HAS_MANY, 'Order', 'order_item_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'item_id' => 'Item',
			'item_description' => 'Item Description',
			'item_image' => 'Item Image',
			'item_price' => 'Item Price',
			'subcategory_id' => 'Subcategory',
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

		$criteria->compare('item_id',$this->item_id);
		$criteria->compare('item_description',$this->item_description,true);
		$criteria->compare('item_image',$this->item_image,true);
		$criteria->compare('item_price',$this->item_price);
		$criteria->compare('subcategory_id',$this->subcategory_id);
//                
                $criteria->addNotInCondition('subcategory_id',array('NULL'));
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Item the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
