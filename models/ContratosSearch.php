<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Contratos;

/**
 * ContratosSearch represents the model behind the search form about `app\models\Contratos`.
 */
class ContratosSearch extends Contratos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_admin', 'id_usuario', 'id_auto', 'id_forms', 'id_estado'], 'integer'],
            [['fecha_inicio', 'fecha_final', 'fecha_registro', 'fecha_modif'], 'safe'],
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
        $query = Contratos::find();

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
            'id_admin' => $this->id_admin,
            'id_usuario' => $this->id_usuario,
            'id_auto' => $this->id_auto,
            'id_forms' => $this->id_forms,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_final' => $this->fecha_final,
            'fecha_registro' => $this->fecha_registro,
            'fecha_modif' => $this->fecha_modif,
            'id_estado' => $this->id_estado,
        ]);

        return $dataProvider;
    }
}
