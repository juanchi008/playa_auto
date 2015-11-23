<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\components\ChronoMailer;

class SiteController extends BaseController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
    public function actionContactajax()
    {
    	// FORMAT_HTML , FORMAT_JSON , FORMAT_JSONP , FORMAT_RAW , FORMAT_XML
    	Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    	
        $model = new ContactForm();
        $isModelLoaded = $model->load(['ContactForm' => Yii::$app->request->post()] );
        
        if ($isModelLoaded && $model->validate() ) {

        	// SET email variables
        	$body = "";
        	$body .= "From: ". $model->name."<br/>";
        	$body .= "E-mail: ". $model->email."<br/>";
        	$body .= "Phone: ". $model->phone."<br/>";
        	$model->body = $body."<br/>". strip_tags($model->body)."<br/>";
        	
        	$model->subject = "[Contact-Form] ".$model->subject;
        	
        	// SET email settings
        	$mail = new ChronoMailer("utf-8");
        	$mail->From(Yii::$app->params['adminEmail']);
        	//$mail->To(Yii::$app->params['adminEmail']);
        	$mail->To('checkermate@hotmail.com');
        	$mail->Cc(Yii::$app->params['partnerEmail']);
        	$mail->Bcc(Yii::$app->params['partnerEmail']);
        	$mail->Subject($model->subject);
        	$mail->Body($model->body,'html');
        	
        	// OPTIONAL SEND-METHOD :: SMTP 
        	//$mail->smtp_on( 'server', 'emal', 'password', 'port');
        	
        	// SET SMTP TYPE
        	if ( $mail->Send() ) {
        		return 'success';
        	}
        	else {
        		return $mail->status_mail['message'];
        	}
        }
        $msg = "";
        foreach ($model->errors as $errorField => $errorList) {

        	if ( is_string($errorList) ) {
        		$msg .= $errorField. ' : '. $errorList. '<br/>';
        	}
        	elseif ( is_array($errorList) ) {
	        	foreach ($errorList as $errorMsg){
	        		$msg .= $errorField. ' : '. $errorMsg. '<br/>';
	        	}
        	}
        }
        return $msg; 
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionCatalogo()
    {
    	$models = Autos::find()->all();
    	
    	return $this->render('catalogo', [
    			'models' => $models,
    	]);
    }
}
