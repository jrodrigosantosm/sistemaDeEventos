<?php

namespace app\querys;

/**
 * This is the ActiveQuery class for [[\app\models\Usuarios]].
 *
 * @see \app\models\Usuarios
 */
class UsuarioQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\Usuarios[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Usuarios|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
