<?php

namespace app\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int $customerid
 * @property int $order_dt
 * @property int $payment_method
 * @property int $paymentid
 * @property int $thawb_type
 * @property int $collar_type
 * @property int $fabric
 * @property int $pocket_style
 * @property int $buttons
 * @property int $thread
 * @property int $sleeves
 * @property double $thawb_length
 * @property double $half_chest_measure
 * @property double $half_waist_measure
 * @property double $lower_width
 * @property double $neck_body
 * @property double $sleave_length
 * @property double $wrist_body
 * @property int $status
 * @property int $order_tailor_dt
 * @property int $stitched_dt
 * @property int $parcelled_dt
 * @property int $delivered_dt
 * @property string $shipping_address1
 * @property string $shipping_city
 * @property string $shipping_zipcode
 * @property string $shipping_country
 *
 * @property Countries $shippingCountry
 * @property User $customer
 * @property Payment $payment
 * @property PaymentMethod $paymentMethod
 * @property Payment[] $payments
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customerid', 'order_dt', 'payment_method', 'paymentid', 'thawb_type', 'collar_type', 'fabric', 'pocket_style', 'buttons', 'thread', 'sleeves', 'thawb_length', 'half_chest_measure', 'half_waist_measure', 'lower_width', 'neck_body', 'sleave_length', 'wrist_body', 'order_tailor_dt', 'stitched_dt', 'parcelled_dt', 'delivered_dt', 'shipping_city', 'shipping_zipcode', 'shipping_country'], 'required'],
            [['customerid', 'order_dt', 'payment_method', 'paymentid', 'thawb_type', 'collar_type', 'fabric', 'pocket_style', 'buttons', 'thread', 'sleeves', 'status', 'order_tailor_dt', 'stitched_dt', 'parcelled_dt', 'delivered_dt'], 'integer'],
            [['thawb_length', 'half_chest_measure', 'half_waist_measure', 'lower_width', 'neck_body', 'sleave_length', 'wrist_body'], 'number'],
            [['shipping_address1'], 'string'],
            [['shipping_city', 'shipping_zipcode'], 'string', 'max' => 20],
            [['shipping_country'], 'string', 'max' => 2],
            [['shipping_city'], 'unique'],
            [['shipping_zipcode'], 'unique'],
            [['shipping_country'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['shipping_country' => 'id']],
            [['customerid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['customerid' => 'id']],
            [['paymentid'], 'exist', 'skipOnError' => true, 'targetClass' => Payment::className(), 'targetAttribute' => ['paymentid' => 'id']],
            [['payment_method'], 'exist', 'skipOnError' => true, 'targetClass' => PaymentMethod::className(), 'targetAttribute' => ['payment_method' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'customerid' => Yii::t('app', 'Customerid'),
            'order_dt' => Yii::t('app', 'Order Dt'),
            'payment_method' => Yii::t('app', 'Payment Method'),
            'paymentid' => Yii::t('app', 'Paymentid'),
            'thawb_type' => Yii::t('app', 'Thawb Type'),
            'collar_type' => Yii::t('app', 'Collar Type'),
            'fabric' => Yii::t('app', 'Fabric'),
            'pocket_style' => Yii::t('app', 'Pocket Style'),
            'buttons' => Yii::t('app', 'Buttons'),
            'thread' => Yii::t('app', 'Thread'),
            'sleeves' => Yii::t('app', 'Sleeves'),
            'thawb_length' => Yii::t('app', 'Thawb Length'),
            'half_chest_measure' => Yii::t('app', 'Half Chest Measure'),
            'half_waist_measure' => Yii::t('app', 'Half Waist Measure'),
            'lower_width' => Yii::t('app', 'Lower Width'),
            'neck_body' => Yii::t('app', 'Neck Body'),
            'sleave_length' => Yii::t('app', 'Sleave Length'),
            'wrist_body' => Yii::t('app', 'Wrist Body'),
            'status' => Yii::t('app', 'Status'),
            'order_tailor_dt' => Yii::t('app', 'Order Tailor Dt'),
            'stitched_dt' => Yii::t('app', 'Stitched Dt'),
            'parcelled_dt' => Yii::t('app', 'Parcelled Dt'),
            'delivered_dt' => Yii::t('app', 'Delivered Dt'),
            'shipping_address1' => Yii::t('app', 'Shipping Address1'),
            'shipping_city' => Yii::t('app', 'Shipping City'),
            'shipping_zipcode' => Yii::t('app', 'Shipping Zipcode'),
            'shipping_country' => Yii::t('app', 'Shipping Country'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShippingCountry()
    {
        return $this->hasOne(Countries::className(), ['id' => 'shipping_country']);
    }


    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(User::className(), ['id' => 'customerid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayment()
    {
        return $this->hasOne(Payment::className(), ['id' => 'paymentid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentMethod()
    {
        return $this->hasOne(PaymentMethod::className(), ['id' => 'payment_method']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['orderid' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return CountryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CountryQuery(get_called_class());
    }
}
