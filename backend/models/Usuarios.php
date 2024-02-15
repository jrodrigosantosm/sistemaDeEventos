<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $id
 * @property string|null $email
 * @property string|null $senha
 * @property string|null $data_nascimento
 * @property string|null $telefone
 * @property int|null $id_arte_marcial
 * @property int|null $id_graduacao
 *
 * @property ArtesMarciais $arteMarcial
 * @property Graduacoes $graduacao
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_nascimento'], 'safe'],
            [['id_arte_marcial', 'id_graduacao'], 'default', 'value' => null],
            [['id_arte_marcial', 'id_graduacao'], 'integer'],
            [['email', 'senha'], 'string', 'max' => 100],
            [['telefone'], 'string', 'max' => 20],
            [['email'], 'unique'],
            [['id_arte_marcial'], 'exist', 'skipOnError' => true, 'targetClass' => ArtesMarciais::className(), 'targetAttribute' => ['id_arte_marcial' => 'id']],
            [['id_graduacao'], 'exist', 'skipOnError' => true, 'targetClass' => Graduacoes::className(), 'targetAttribute' => ['id_graduacao' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'Email'),
            'senha' => Yii::t('app', 'Senha'),
            'data_nascimento' => Yii::t('app', 'Data Nascimento'),
            'telefone' => Yii::t('app', 'Telefone'),
            'id_arte_marcial' => Yii::t('app', 'Id Arte Marcial'),
            'id_graduacao' => Yii::t('app', 'Id Graduacao'),
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
     * Gets query for [[Graduacao]].
     *
     * @return \yii\db\ActiveQuery|\app\querys\GraduacoesQuery
     */
    public function getGraduacao()
    {
        return $this->hasOne(Graduacoes::className(), ['id' => 'id_graduacao']);
    }

    /**
     * {@inheritdoc}
     * @return \app\querys\UsuarioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\querys\UsuarioQuery(get_called_class());
    }
}
