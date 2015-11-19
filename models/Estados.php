<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estados".
 *
 * @property integer $id
 * @property string $nombre_estado
 * @property string $contexto
 *
 * @property Autos[] $autos
 * @property Contratos[] $contratos
 * @property Usuarios[] $usuarios
 */
class Estados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estados';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nombre_estado'], 'required'],
            [['id'], 'integer'],
            [['nombre_estado', 'contexto'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre_estado' => 'Nombre Estado',
            'contexto' => 'Contexto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutos()
    {
        return $this->hasMany(Autos::className(), ['id_estado' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContratos()
    {
        return $this->hasMany(Contratos::className(), ['id_estado' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuarios::className(), ['id_estado' => 'id']);
    }
}
