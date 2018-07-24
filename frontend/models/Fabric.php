<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fabric".
 *
 * @property int $id
 * @property string $des
 * @property string $color
 */
class Fabric extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fabric';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['des', 'color'], 'required'],
            [['des'], 'string', 'max' => 20],
            [['color'], 'string', 'max' => 12],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'des' => Yii::t('app', 'Des'),
            'color' => Yii::t('app', 'Color'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return FabricQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FabricQuery(get_called_class());
    }
}
