<?php

namespace app\querys;

/**
 * This is the ActiveQuery class for [[\app\models\ArtesMarciais]].
 *
 * @see \app\models\ArtesMarciais
 */
class ArtesMarciaisQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\ArtesMarciais[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\ArtesMarciais|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
