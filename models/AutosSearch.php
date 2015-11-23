<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Autos;
use app\components\Fn;

/**
 * AutosSearch represents the model behind the search form about `app\models\Autos`.
 */
class AutosSearch extends Autos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'precio', 'id_estado'], 'integer'],
            [['marca', 'modelo', 'ano', 'color', 'no_motor', 'matricula_auto', 'no_chassis', 'observaciones', 'kilometraje', 'no_chapa', 'fecha_registro'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
    	$query = Autos::find();
    
    	$dataProvider = new ActiveDataProvider([
    			'query' => $query,
    			]);
    
    	$this->load($params);
    
    	if (!$this->validate()) {
    		// uncomment the following line if you do not want to return any records when validation fails
    		// $query->where('0=1');
    		return $dataProvider;
    	}
    
    	$query->andFilterWhere([
    			'id' => $this->id,
    			'precio' => $this->precio,
    			'fecha_registro' => $this->fecha_registro,
    			'id_estado' => $this->id_estado,
    			]);
    
    	$query->andFilterWhere(['like', 'marca', $this->marca]);
    	/*
    	->andFilterWhere(['like', 'modelo', $this->modelo])
    	->andFilterWhere(['like', 'ano', $this->ano])
    	->andFilterWhere(['like', 'color', $this->color])
    	->andFilterWhere(['like', 'no_motor', $this->no_motor])
    	->andFilterWhere(['like', 'matricula_auto', $this->matricula_auto])
    	->andFilterWhere(['like', 'no_chassis', $this->no_chassis])
    	->andFilterWhere(['like', 'observaciones', $this->observaciones])
    	->andFilterWhere(['like', 'kilometraje', $this->kilometraje])
    	->andFilterWhere(['like', 'no_chapa', $this->no_chapa]);
    	*/
		$sort = SORT_DESC;
    	if( !empty($params['AutosSearch']['sort']))
    		$sort = $params['AutosSearch']['sort'];
    	$query->orderBy = ['fecha_registro' => $sort ];
    	
    	$precioRange = '1-999999';
    	
    	if( !empty($params['AutosSearch']['precioRange'])) {
    		$precioRange = explode('-', $params['AutosSearch']['precioRange']);
    		$precioRange[0] = intval(trim($precioRange[0] ) );
    		$precioRange[1] = intval(trim($precioRange[1] ) );

    		$query->andWhere("precio >= ".$precioRange[0] );
    		$query->andWhere("precio <= ".$precioRange[1] );
    	}
    		//Fn::PrintVar($query, 'query');
    		//exit;
    		 
    	
    	return $dataProvider;
    }

    /**
     * Creates AJAX data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function getAjaxHTML($models)
    {
    	$html = "<h3>No se encontro nada</h3>";
    	
    	if(count($models)) {
    		
    		$html ="";
    		
			foreach($models as $model) {
				
			 	$precio = number_format($model->precio, 0, '.', '.');
			 	
			 	$temp = <<<EOD
				<div class="element-item grid_4 c1">
					<div class="box_7">
						<div class="img-wrap">
							<img src="../../images/index-2_img01.jpg" alt="Image 1"/>
						</div>
						<div class="caption">
							<h3 class="text_2 color_2"><a href="#">{$model->marca} - {$model->modelo}</a></h3>
							<p class="text_3">
								<span style="font-weight: bold;">Ano:</span> {$model->ano}<br/>
								<span style="font-weight: bold;">Color:</span> {$model->color}<br/>
								<span style="font-weight: bold;">observaciones:</span> {$model->observaciones}<br/>
								<span style="font-weight: bold;">kilometraje:</span> {$model->kilometraje}<br/>
								<span style="font-weight: bold;">Precio:</span> {$precio} $
							</p>
							<a class="btn_2" href="#">Más Detalles</a>
						</div>
						<!-- <a class="btn_2" href="#">Reservar</a></div>-->
					</div>
				</div>
EOD;
			 	$html .= $temp;
			}
		}
		return $html;
	}
    
}
