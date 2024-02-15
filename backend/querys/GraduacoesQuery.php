<?php

namespace app\querys;

/**
 * This is the ActiveQuery class for [[\app\models\Graduacoes]].
 *
 * @see \app\models\Graduacoes
 */
class GraduacoesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\Graduacoes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Graduacoes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
