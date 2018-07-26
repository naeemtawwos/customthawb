<?php

namespace app\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "orders_hept".
 *
 * @property int $id
 * @property int $qty
 * @property double $price
 * @property string $purchasedate
 * @property int $customer_id
 * @property int $product_id
 * @property string $delivery_status 

 * @property User $customer
 * @property Products $product
 */
class OrdersHept extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders_hept';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['qty', 'customer_id', 'product_id'], 'integer'],
            ['qty', 'validateStock'],
            [['price'], 'number'],
            [['purchasedate'], 'safe'],
            [['customer_id'], 'required'],
            [['delivery_status'], 'string'],            
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['customer_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'qty' => Yii::t('app', 'Qty'),
            'price' => Yii::t('app', 'Price'),
            'purchasedate' => Yii::t('app', 'Purchasedate'),
            'customer_id' => Yii::t('app', 'Customer ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'delivery_status' => 'Delivery Status',            
        ];
    }

    
    
    public function validateStock($attribute, $params, $validator){        
        $stockqty = Products::findOne($this->product_id)->stockqty;
        if($stockqty < 1){         
            $this->addError($attribute, 'Sorry out of stock');
        }
        elseif($this->$attribute > $stockqty){        
            $this->addError($attribute, 'available stock is '.$stockqty);
        }
        
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(User::className(), ['id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }

    /**
     * {@inheritdoc}
     * @return OrdersHeptQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrdersHeptQuery(get_called_class());
    }
}
