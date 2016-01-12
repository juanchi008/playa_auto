<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
//use yii\base\NotSupportedException;
//use app\components\Fn;
// use yii\web\IdentityInterface;
//use yii\base\Security;
//use yii\behaviors\TimestampBehavior;
//use yii\db\Expression;

/**
 * This is the model class for table "{{%courtier}}".
 *
 * @property string $courtier_id
 * @property string $bureau_id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $auth_key
 * @property string $password_reset_token
 * @property integer $role
 * @property string $fullname
 * @property string $lang
 * @property string $telephone
 * @property string $fax
 * @property integer $updated_by_id
 * @property string $date_login
 * @property string $date_modify
 * @property string $date_create
 * @property integer $courtier_etat_id
 */
class Courtier extends ActiveRecord 
{
	// Temporary variables
	public $passwordConfirm = '';
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%courtier}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        		
        	// required
        	[['bureau_id', 'username', 'email', 'role', 'fullname', 'lang','telephone', 'updated_by_id', 'date_login', 'date_modify', 'date_create', 'courtier_etat_id'], 'required'],
        		
        	//default value
        		
        	// Validation: PHP
        	[['password', 'passwordConfirm'], 'required', 'on' => 'register'],
        	[['passwordConfirm'], 'compare', 'compareAttribute' => 'password'],
        	[['password'], 'string','min' => 8, 'max' => 60],
        	[['auth_key'], 'string','min' => 8, 'max' => 32],
        	[['password_reset_token'], 'string','min' => 1, 'max' => 255],

        	[['username','fullname'], 'string','min' => 8, 'max' => 50],
        	[['lang'], 'in', 'range' => ['en','fr'], 'strict' => true],
        	[['role', 'bureau_id', 'updated_by_id', 'courtier_etat_id'], 'integer'],
        	[['date_login', 'date_modify'], 'string','min' => 16, 'max' => 20],
        	[['date_create'],'date', 'format'=>'yyyy-MM-dd HH:mm:ss'],
        	[['username','email','password','fullname'], 'filter', 'filter' => 'trim'],
        	[['email'], 'email'],
            [['telephone', 'fax'], 'string', 'max' => 25],
        		
        	// Validation : MySQL
        	[['username','email'], 'unique']

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'courtier_id' => Yii::t('app', 'ID'),
            'bureau_id' => Yii::t('app', 'Bureau'),
            'username' => Yii::t('app', 'Username'),
            'email' => Yii::t('app', 'E-mail'),
            'password' => Yii::t('app', 'Password'),
            'passwordConfirm' => Yii::t('app', 'Password Confirm'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'role' => Yii::t('app', 'Role'),
            'fullname' => Yii::t('app', 'Name'),
            'lang' => Yii::t('app', 'Lang'),
            'telephone' => Yii::t('app', 'Phone'),
            'fax' => Yii::t('app', 'Fax'),
            'updated_by_id' => Yii::t('app', 'Updated By'),
            'date_login' => Yii::t('app', 'Login'),
            'date_modify' => Yii::t('app', 'Modify'),
            'date_create' => Yii::t('app', 'Create'),
            'courtier_etat_id' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function GetUpdatedBy($id) {
    	if (($model = Courtier::findOne($id)) !== null)
    		return $model->fullname;
    	else
    		return Yii::t('app', 'N/A');
    }
    
    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password = null)
    {
    	$password = (is_null($password)) ? $this->password : $password;
    	$this->password = Yii::$app->getSecurity()->generatePasswordHash($password); //Security::generatePasswordHash($password);//$password;
    }
    
    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
    	$this->auth_key = Yii::$app->getSecurity()->generateRandomString(); //Security::generateRandomKey();
    }
    
    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
    	$this->password_reset_token = Yii::$app->getSecurity()->generateRandomString() . '_' . time(); //Security::generateRandomKey() . '_' . time();
    }
    
    
    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
    	$this->password_reset_token = null;
    }
    
    /**
     * @inheritdoc
     */
    public function save($runValidation = false, $attributeNames = null)
    {
    	if($this->isNewRecord) {
    		//$this->date_login = '0000-00-00 00:00:00';
    		//$this->date_modify = '0000-00-00 00:00:00';
    		$this->date_create = Yii::$app->fn->GetDateTime();
    	}
    	else {
    		//$this->date_login = Yii::$app->fn->GetDateTime();
    		$this->date_modify = Yii::$app->fn->GetDateTime();
    	}
    	return parent::save($runValidation, $attributeNames);
    	//return false;
    }
}
