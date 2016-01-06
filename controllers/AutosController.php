<?php

namespace app\controllers;

use Yii;
use app\models\Autos;
use app\models\AutosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AutosController implements the CRUD actions for Autos model.
 */
class AutosController extends Controller
{
	/**
	 * @inheritdoc
	 */
	public function beforeAction($action)
	{
		$csrfActionList = [
			'delete' => false,
		];
		
		if ( array_key_exists($action->id, $csrfActionList)) {
			Yii::$app->controller->enableCsrfValidation = $csrfActionList[$action->id];
		}
	
		return parent::beforeAction($action);
	}
	
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Autos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AutosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Autos model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Autos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Autos();
        $msg = "";
        //$model = $this->findModel(7);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
        	$msg = "New car added success.";
        } 
        else {
        	$msg = "New car validation failed.";
        }
        return $this->render('create', [
            'model' => $model,
           	'msg' => $msg,
        ]);
    }

    /**
     * Updates an existing Autos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Autos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Autos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Autos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Autos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCatalogo()
    {
    	//$models = Autos::find()->all();
    	$modelSearch = new AutosSearch();
    	$dataProvider = $modelSearch->search(Yii::$app->request->queryParams);
    	$models = $dataProvider->getModels();
    	 
    	return $this->render('catalogo', [
	    	'models' => $models,
	    	'modelSearch' => $modelSearch,
    	]);
    }

    public function actionCatalogoajax()
    {
    	// FORMAT_HTML , FORMAT_JSON , FORMAT_JSONP , FORMAT_RAW , FORMAT_XML
    	Yii::$app->response->format = \yii\web\Response::FORMAT_HTML;
    	
    	$modelSearch = new AutosSearch();
    	$dataProvider = $modelSearch->search(Yii::$app->request->queryParams);
    	$models = $dataProvider->getModels();
    	
    	$html = $modelSearch->getAjaxHTML($models);
    	
    	return $html;
    }
}
