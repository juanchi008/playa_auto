<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contratos".
 *
 * @property integer $id
 * @property integer $id_admin
 * @property integer $id_usuario
 * @property integer $id_auto
 * @property integer $id_forms
 * @property string $fecha_inicio
 * @property string $fecha_final
 * @property string $fecha_registro
 * @property string $fecha_modif
 * @property integer $id_estado
 *
 * @property Admins $idAdmin
 * @property Autos $idAuto
 * @property Estados $idEstado
 * @property FormsDatos $idForms
 * @property Usuarios $idUsuario
 */
class Contratos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contratos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_admin', 'id_usuario', 'id_auto', 'id_forms', 'fecha_inicio', 'fecha_final', 'fecha_registro', 'fecha_modif', 'id_estado'], 'required'],
            [['id', 'id_admin', 'id_usuario', 'id_auto', 'id_forms', 'id_estado'], 'integer'],
            [['fecha_inicio', 'fecha_final', 'fecha_registro', 'fecha_modif'], 'safe']
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
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_final' => 'Fecha Final',
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
    public function getIdEstado()
    {
        return $this->hasOne(Estados::className(), ['id' => 'id_estado']);
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
