<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "artes_marciais".
 *
 * @property int $id
 * @property string|null $nome
 *
 * @property Graduacoes[] $graduacoes
 * @property Usuarios[] $usuarios
 */
class ArtesMarciais extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'artes_marciais';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'string', 'max' => 100],
            [['nome'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nome' => Yii::t('app', 'Nome'),
        ];
    }

    /**
     * Gets query for [[Graduacoes]].
     *
     * @return \yii\db\ActiveQuery|\app\querys\GraduacoesQuery
     */
    public function getGraduacoes()
    {
        return $this->hasMany(Graduacoes::className(), ['id_arte_marcial' => 'id']);
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery|\app\querys\UsuariosQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuarios::className(), ['id_arte_marcial' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\querys\ArtesMarciaisQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\querys\ArtesMarciaisQuery(get_called_class());
    }
}
