<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "forms_datos".
 *
 * @property integer $id
 * @property string $datos
 *
 * @property Contratos[] $contratos
 * @property Ventas[] $ventas
 */
class FormsDatos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'forms_datos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'datos'], 'required'],
            [['id'], 'integer'],
            [['datos'], 'string', 'max' => 5000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'datos' => 'Datos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContratos()
    {
        return $this->hasMany(Contratos::className(), ['id_forms' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Ventas::className(), ['id_forms' => 'id']);
    }
}
