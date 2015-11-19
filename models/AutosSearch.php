<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Autos;

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

        $query->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'modelo', $this->modelo])
            ->andFilterWhere(['like', 'ano', $this->ano])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'no_motor', $this->no_motor])
            ->andFilterWhere(['like', 'matricula_auto', $this->matricula_auto])
            ->andFilterWhere(['like', 'no_chassis', $this->no_chassis])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'kilometraje', $this->kilometraje])
            ->andFilterWhere(['like', 'no_chapa', $this->no_chapa]);

        return $dataProvider;
    }
}
