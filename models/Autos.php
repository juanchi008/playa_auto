<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "autos".
 *
 * @property integer $id
 * @property string $marca
 * @property string $modelo
 * @property string $ano
 * @property string $color
 * @property string $no_motor
 * @property string $matricula_auto
 * @property string $no_chassis
 * @property string $observaciones
 * @property string $kilometraje
 * @property string $no_chapa
 * @property integer $precio
 * @property string $fecha_registro
 * @property integer $id_estado
 *
 * @property Estados $idEstado
 * @property Contratos[] $contratos
 * @property Ventas[] $ventas
 */
class Autos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'autos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'marca', 'modelo', 'ano', 'color', 'no_motor', 'matricula_auto', 'no_chassis', 'observaciones', 'kilometraje', 'no_chapa', 'precio', 'fecha_registro', 'id_estado'], 'required'],
            [['id', 'precio', 'id_estado'], 'integer'],
            [['fecha_registro'], 'safe'],
            [['marca', 'modelo', 'color', 'no_motor', 'matricula_auto', 'no_chassis', 'observaciones', 'kilometraje', 'no_chapa'], 'string', 'max' => 50],
            [['ano'], 'string', 'max' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'ano' => 'Ano',
            'color' => 'Color',
            'no_motor' => 'No Motor',
            'matricula_auto' => 'Matricula Auto',
            'no_chassis' => 'No Chassis',
            'observaciones' => 'Observaciones',
            'kilometraje' => 'Kilometraje',
            'no_chapa' => 'No Chapa',
            'precio' => 'Precio',
            'fecha_registro' => 'Fecha Registro',
            'id_estado' => 'Id Estado',
        ];
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
    public function getContratos()
    {
        return $this->hasMany(Contratos::className(), ['id_auto' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Ventas::className(), ['id_auto' => 'id']);
    }

    /**
     * @return PHP_ARRAY_ASSOC
     */
    public static function getMarcasList($searchIndex = 'N/A') {
        $arr = [
	        'Audi'     		=> 'Audi', 
	        'BMW'     		=> 'BMW', 
	        'Honda'     	=> 'Honda', 
	        'Mercedez'     	=> 'Mercedez', 
	        'Nissan'     	=> 'Nissan', 
	        'Toyota'     	=> 'Toyota', 
	        'Volkswagen'    => 'Volkswagen', 
	        'Volvo'    		=> 'Volvo', 
        ];
        if($searchIndex == 'N/A') 
            return $arr;
        elseif(is_null($searchIndex) )
            return 'N/D';
        else 
            return $arr[$searchIndex];
    }

    /**
     * @return PHP_ARRAY_ASSOC
     */
    public static function getPreciosList($searchIndex = 'N/A') {
    	$arr = [
	    	'0-5000'     		=> 'Menor a  5000',
	    	'5000-10000'     	=> '   5.000 $ -  10.000 $',
	    	'10000-20000'     	=> '  10.000 $ -  20.000 $',
	    	'20000-30000'     	=> '  20.000 $ -  30.000 $',
	    	'30000-40000'     	=> '  30.000 $ -  40.000 $',
	    	'40000-50000'     	=> '  40.000 $ -  50.000 $',
	    	'50000-60000'     	=> '  50.000 $ -  60.000 $',
	    	'60000-70000'     	=> '  60.000 $ -  70.000 $',
	    	'70000-80000'     	=> '  70.000 $ -  80.000 $',
	    	'80000-90000'     	=> '  80.000 $ -  90.000 $',
	    	'90000-100000'     	=> '  90.000 $ - 100.000 $',
	    	'100000-1000000'    => '1000.000 $ o mas',
    	];
    	if($searchIndex == 'N/A')
    		return $arr;
    	elseif(is_null($searchIndex) )
    	return 'N/D';
    	else
    		return $arr[$searchIndex];
    }

    /**
     * @return PHP_ARRAY_ASSOC
     */
    public static function getNuevosList($searchIndex = 'N/A') {
    	$arr = [
    		'asc'	=> 'Ascendente',
    		'desc'	=> 'Descendente',
    	];
    	if($searchIndex == 'N/A')
    		return $arr;
    	elseif(is_null($searchIndex) )
    	return 'N/D';
    	else
    		return $arr[$searchIndex];
    }
}