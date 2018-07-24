<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "params".
 *
 * @property int $id
 * @property string $param_type
 * @property string $param_des
 */
class Params extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'params';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['param_type', 'param_des'], 'required'],
            [['param_type'], 'string', 'max' => 5],
            [['param_des'], 'string', 'max' => 20],
            [['param_type', 'param_des'], 'unique', 'targetAttribute' => ['param_type', 'param_des']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'param_type' => Yii::t('app', 'Param Type'),
            'param_des' => Yii::t('app', 'Param Description'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ParamsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ParamsQuery(get_called_class());
    }
}
