<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ventas".
 *
 * @property integer $id
 * @property integer $id_admin
 * @property integer $id_usuario
 * @property integer $id_auto
 * @property integer $id_forms
 * @property integer $tiene_consignacion
 * @property integer $id_form_consignacion
 * @property string $fecha_inicio
 * @property string $fecha_registro
 * @property string $fecha_modif
 * @property integer $id_estado
 *
 * @property Admins $idAdmin
 * @property Autos $idAuto
 * @property FormsDatos $idForms
 * @property Usuarios $idUsuario
 */
class Ventas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ventas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_admin', 'id_usuario', 'id_auto', 'id_forms', 'tiene_consignacion', 'id_form_consignacion', 'fecha_inicio', 'fecha_registro', 'fecha_modif', 'id_estado'], 'required'],
            [['id', 'id_admin', 'id_usuario', 'id_auto', 'id_forms', 'tiene_consignacion', 'id_form_consignacion', 'id_estado'], 'integer'],
            [['fecha_inicio', 'fecha_registro', 'fecha_modif'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_admin' => 'Id Admin',
            'id_usuario' => 'Id Usuario',
            'id_auto' => 'Id Auto',
            'id_forms' => 'Id Forms',
            'tiene_consignacion' => 'Tiene Consignacion',
            'id_form_consignacion' => 'Id Form Consignacion',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_registro' => 'Fecha Registro',
            'fecha_modif' => 'Fecha Modif',
            'id_estado' => 'Id Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAdmin()
    {
        return $this->hasOne(Admins::className(), ['id' => 'id_admin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAuto()
    {
        return $this->hasOne(Autos::className(), ['id' => 'id_auto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdForms()
    {
        return $this->hasOne(FormsDatos::className(), ['id' => 'id_forms']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'id_usuario']);
    }
}
