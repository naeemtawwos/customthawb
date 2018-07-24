<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Fabric]].
 *
 * @see Fabric
 */
class FabricQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Fabric[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Fabric|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
