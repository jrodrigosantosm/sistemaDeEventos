<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "graduacoes".
 *
 * @property int $id
 * @property int|null $id_arte_marcial
 * @property string|null $graduacao
 *
 * @property ArtesMarciais $arteMarcial
 * @property Usuarios[] $usuarios
 */
class Graduacoes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'graduacoes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_arte_marcial'], 'default', 'value' => null],
            [['id_arte_marcial'], 'integer'],
            [['graduacao'], 'string', 'max' => 50],
            [['id_arte_marcial'], 'exist', 'skipOnError' => true, 'targetClass' => ArtesMarciais::className(), 'targetAttribute' => ['id_arte_marcial' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_arte_marcial' => Yii::t('app', 'Id Arte Marcial'),
            'graduacao' => Yii::t('app', 'Graduacao'),
        ];
    }

    /**
     * Gets query for [[ArteMarcial]].
     *
     * @return \yii\db\ActiveQuery|\app\querys\ArtesMarciaisQuery
     */
    public function getArteMarcial()
    {
        return $this->hasOne(ArtesMarciais::className(), ['id' => 'id_arte_marcial']);
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery|\app\querys\UsuariosQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuarios::className(), ['id_graduacao' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\querys\GraduacoesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\querys\GraduacoesQuery(get_called_class());
    }
}
