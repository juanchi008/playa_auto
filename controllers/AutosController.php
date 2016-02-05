<?php

namespace app\controllers;

use Yii;
use app\models\Autos;
use app\models\AutosSearch;

use app\models\Identity;
use app\components\AccessRule;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\controllers\BaseController;
use yii\web\NotFoundHttpException;

use app\models\UploadForm;
use yii\web\UploadedFile;
use app\components\Fn;

/**
 * AutosController implements the CRUD actions for Autos model.
 */
class AutosController extends BaseController
{
	/**
	 * @inheritdoc
	 */
	public function beforeAction($action)
	{
        return [
            'access' => [
                'class' => AccessControl::className(),
            	'ruleConfig' => [
            		'class' => AccessRule::className(),
            	],
                'only' => ['index','view', 'create', 'update', 'delete', 'catalogo', 'catalogoajax'],
                'rules' => [
                    [
                        'actions' => ['view', 'update', 'index','create', 'delete', 'upload' ],
                        'allow' => true,
                        'roles' => [
                        	Identity::ROLE_ADMIN,
                        	Identity::ROLE_SUPERADMIN
                        ],
                    ],
                    [
                        'actions' => [ 'catalogo', 'catalogoajax' ],
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
            return $this->redirect(['view', 'id' => $model->id]);
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
        } 
        
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Upload a new Autos picture.
     * If upload is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionUpload($id)
    {
        $model = $this->findModel($id);
        $upload = new UploadForm();
        $errorMsg = "";
        $successMsg = "";

        /*
        if ($upload->load(Yii::$app->request->post()) && $upload->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } 
        */
        if (Yii::$app->request->isPost) {
        	
        	$upload->file = UploadedFile::getInstance($upload, 'file');
        	
        	if ($upload->file && $upload->validate()) {
        		
        		$dirPath = \Yii::$app->fn->GetUploadedDir ("autos").'/' . $model->id;
        		$filename = $upload->file->baseName . '.' . $upload->file->extension;
        		$filePath = $dirPath.'/'.$filename;

        		/*
        		Fn::PrintVar($upload, 'upload');
        		Fn::PrintVar($dirPath, 'dirPath');
        		Fn::PrintVar($filename, 'filename');
        		Fn::PrintVar($filePath, 'filePath');
        		*/
        		// CHECK file extension
        		if (empty($errorMsg) && !$upload->isImage($upload->file->extension) )
        			$errorMsg .= "Error: invalid file type selected.<br/>";
        		
        		// CREATE folder/subfolders if not exists
        		if (empty($errorMsg) && !is_dir($dirPath))
        			if (!mkdir($dirPath, 0777, true) )
        				$errorMsg .= "Error: unable to create folder at location : $dirPath<br/>";

        		// DELETE file if exists
        		if (empty($errorMsg) && file_exists($filePath)) {
        			if(!unlink($filePath))
        				$errorMsg .= "Error: unable to delete the previous file with the same name at location : $filePath<br/>";
        		}
        		
        		// SAVE uploaded file to local folder
        		if (empty($errorMsg) ) {
        			if (!$upload->file->saveAs($filePath, true) ) {
        				$errorMsg .= "Error: unable to save the file at location : $filePath<br/>";
        			}
        			else {
        				if(empty($model->img) ) { 
        					$model->img = \Yii::$app->homeUrl.$filePath;
        					$model->save();
        				}
        				$successMsg .= "File : $filename upload success !<br/>";
        			}
        		}
        		
        	}
        }
        return $this->render('upload', [
            'model' 		=> $model,
           	'upload'		=> $upload,
        	'errorMsg' 		=> $errorMsg,
        	'successMsg' 	=> $successMsg,
        ]);
    }

    /**
     * Deletes an existing file uploaded.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteuploadedfiles($id, $filePath)
    {
    	if (Yii::$app->request->isPost) {
	    	$model = $this->findModel($id);
	    	
	    	if( $model->img != $filePath) {
	    		\Yii::$app->fn->DeleteUploadedFiles($filePath);
	    	}
    	}
    	return $this->redirect(['update', 'id' => $model->id]);
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
