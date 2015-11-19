<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property integer $id
 * @property string $nombre_usuario
 * @property string $contrasena
 * @property string $nombre
 * @property string $email
 * @property string $estado_civil
 * @property string $direccion
 * @property string $numero_oficina
 * @property string $ciudad
 * @property string $provincia
 * @property integer $id_provincia
 * @property string $codigo_postal
 * @property integer $id_pais
 * @property string $numero_casa
 * @property string $numero_trabajo
 * @property string $numero_movil
 * @property string $cargo_trabajo
 * @property string $fecha_registro
 * @property string $fecha_conexion
 * @property string $fecha_modif
 * @property integer $id_estado
 *
 * @property Contratos[] $contratos
 * @property Estados $idEstado
 * @property Paises $idPais
 * @property Provincias $idProvincia
 * @property Ventas[] $ventas
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nombre_usuario', 'contrasena', 'nombre', 'email', 'estado_civil', 'direccion', 'ciudad', 'id_provincia', 'codigo_postal', 'id_pais', 'numero_casa', 'fecha_registro', 'fecha_conexion', 'fecha_modif', 'id_estado'], 'required'],
            [['id', 'id_provincia', 'id_pais', 'id_estado'], 'integer'],
            [['fecha_registro', 'fecha_conexion', 'fecha_modif'], 'safe'],
            [['nombre_usuario', 'nombre', 'email', 'estado_civil', 'direccion', 'numero_oficina', 'ciudad', 'provincia', 'codigo_postal', 'cargo_trabajo'], 'string', 'max' => 50],
            [['contrasena'], 'string', 'max' => 75],
            [['numero_casa', 'numero_trabajo', 'numero_movil'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre_usuario' => 'Nombre Usuario',
            'contrasena' => 'Contrasena',
            'nombre' => 'Nombre',
            'email' => 'Email',
            'estado_civil' => 'Estado Civil',
            'direccion' => 'Direccion',
            'numero_oficina' => 'Numero Oficina',
            'ciudad' => 'Ciudad',
            'provincia' => 'Provincia',
            'id_provincia' => 'Id Provincia',
            'codigo_postal' => 'Codigo Postal',
            'id_pais' => 'Id Pais',
            'numero_casa' => 'Numero Casa',
            'numero_trabajo' => 'Numero Trabajo',
            'numero_movil' => 'Numero Movil',
            'cargo_trabajo' => 'Cargo Trabajo',
            'fecha_registro' => 'Fecha Registro',
            'fecha_conexion' => 'Fecha Conexion',
            'fecha_modif' => 'Fecha Modif',
            'id_estado' => 'Id Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContratos()
    {
        return $this->hasMany(Contratos::className(), ['id_usuario' => 'id']);
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
    public function getIdPais()
    {
        return $this->hasOne(Paises::className(), ['id' => 'id_pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProvincia()
    {
        return $this->hasOne(Provincias::className(), ['id' => 'id_provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Ventas::className(), ['id_usuario' => 'id']);
    }
}
