<?php

namespace app\controllers;

use Yii;
use app\models\Clientes;
use app\models\ClientesSearch;
use app\models\Identity;
use app\components\AccessRule;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\controllers\BaseController;
use yii\web\NotFoundHttpException;
use app\models\Provincias;
//use yii\web\ForbiddenHttpException;

/**
 * ClientesController implements the CRUD actions for Clientes model.
 */
class ClientesController extends BaseController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
            	'ruleConfig' => [
            		'class' => AccessRule::className(),
            	],
                'only' => ['index','view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index','create', 'delete' ],
                        'allow' => true,
                        'roles' => [
                        	Identity::ROLE_ADMIN,
                        	Identity::ROLE_SUPERADMIN
                        ],
                    ],
                    [
                        'actions' => ['view', 'update' ],
                        'allow' => true,
                        'roles' => [
                        	Identity::ROLE_CLIENTES,
                        	Identity::ROLE_ADMIN,
                        	Identity::ROLE_SUPERADMIN
                        ],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Clientes models.
     * @return mixed
     */
    public function actionIndex()
    {
    	if(!\Yii::$app->user->identity->isAdmin() )
    		throw new ForbiddenHttpException('You are not allowed to access this page.');
    	
        $searchModel = new ClientesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Clientes model.
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
     * Creates a new Clientes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Clientes();
        $model->setScenario('register');
		$post = Yii::$app->request->post();
        $formName = basename($model->className());
		
        if ( $model->load($post ) ) {
        	
        	// Default value
        	$model->role = (isset($post[$formName]['role']) ) ? $post[$formName]['role'] : 20;
        	$model->fecha_conexion = (isset($post[$formName]['fecha_conexion']) ) ? $post[$formName]['fecha_conexion'] : Yii::$app->fn->GetDate('none');
        	$model->fecha_modif = (isset($post[$formName]['fecha_modif']) ) ? $post[$formName]['fecha_modif'] : Yii::$app->fn->GetDate('none');
        	$model->fecha_registro = (isset($post[$formName]['fecha_registro']) ) ? $post[$formName]['fecha_registro'] : Yii::$app->fn->GetDate();
        	$model->id_estado = (isset($post[$formName]['id_estado']) ) ? $post[$formName]['id_estado'] : 1;

        	// VALIDATE: Provincia
        	if( !empty($model->id_provincia))
        		$nombre_provincia = Provincias::findOne( ['id' => $model->id_provincia] )->nombre_provincia;
        	
        	if( empty($model->id_provincia) && empty($model->provincia))
        		$model->addError($model->provincia, 'Please fill the provincia field.' );
        	elseif( !empty($model->id_provincia) && !empty($model->provincia) && ($nombre_provincia != $model->provincia) )
        		$model->addError($model->id_provincia, 'Please select provincia from the list or fill manually your provincia.' );
        	elseif( !empty($model->id_provincia)) 
        		$model->provincia = $nombre_provincia;
        	else 
        		$model->id_provincia = null;
        	
	        if ( !count($model->errors) && $model->validate() ) {
	        	
	        	$model->setPassword();
	        	$model->generateAuthKey();
	        	if($model->save())
	        		return $this->redirect(['view', 'id' => $model->id]);
	        }
        }
        // Load empty/error form
		return $this->render('create', ['model' => $model] );
    }

    /**
     * Updates an existing Clientes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$post = Yii::$app->request->post();
        $formName = basename($model->className());
		
        // default Form value
        $contrasenaPrevious = $model->contrasena;
        $model->contrasena = '';
        $model->passwordConfirm = '';

        if ( $model->load($post ) ) {
        	
        	// Default value
        	$model->fecha_modif = Yii::$app->fn->GetDate();
        	$model->id_estado = (isset($post[$formName]['id_estado']) ) ? $post[$formName]['id_estado'] : 1;

        	// VALIDATE: Provincia
        	if( !empty($model->id_provincia))
        		$nombre_provincia = $model->getProvincia();
        	 
        	if( empty($model->id_provincia) && empty($model->provincia))
        		$model->addError($model->provincia, 'Please fill the provincia field.' );
        	elseif( !empty($model->id_provincia) && !empty($model->provincia) && ($nombre_provincia != $model->provincia) )
        		$model->addError($model->id_provincia, 'Please select provincia from the list or fill manually your provincia.' );
        	elseif( !empty($model->id_provincia))
        		$model->provincia = $nombre_provincia;
        	else
        		$model->id_provincia = null;
        	
        	// VALIDATE: Contrasena
        	if($model->contrasena != $model->passwordConfirm)
        		$model->addError($model->passwordConfirm, 'Password Confirm must be repeated exactly.' );

        	//\Yii::$app->fn->PrintVar($model, 'model');
        	//\Yii::$app->fn->PrintVar($nombre_provincia, 'nombre_provincia');
        	
        	if ( !count($model->errors) && $model->validate() ) {
        		
        		if($model->contrasena == '') {
        			$model->contrasena = $contrasenaPrevious;
        		}
        		else {
        			$model->setPassword();
        			$model->generateAuthKey();
        		}
        		if($model->save())
        			return $this->redirect(['view', 'id' => $model->id]);
        			
        	}
        }
        return $this->render('update', [
        	'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Clientes model.
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
     * Finds the Clientes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Clientes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Clientes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
