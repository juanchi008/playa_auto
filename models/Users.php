<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%users}}".
 *
 * @property string $id
 * @property string $email
 * @property string $password
 * @property string $fullname
 * @property string $lang
 * @property integer $is_super_admin
 * @property integer $added_by_id
 * @property string $date_login
 * @property string $date_modify
 * @property string $date_create
 * @property integer $status_id
 */
class Users extends \yii\db\ActiveRecord
{
	// Temporary variables
	public $passwordConfirm = '';
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%users}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        	// not required
            [['is_super_admin', 'added_by_id', 'date_login', 'date_modify', 'date_create', 'status_id'], 'safe'],
        	// required
            [['email','password', 'fullname', 'lang'], 'required'],
        	//default value
        	// Validation: PHP
            [['email'], 'email'],
            [['password'], 'string','min' => 8, 'max' => 50],
            [['passwordConfirm'], 'required', 'on' => 'register'],
        	[['passwordConfirm'], 'compare', 'compareAttribute' => 'password', 'on' => 'register'],
            [['fullname'], 'string','min' => 4, 'max' => 50],
        	[['lang'], 'in', 'range' => ['En','Fr'], 'strict' => true],
            [['is_super_admin', 'added_by_id'], 'integer'],
            [['date_login', 'date_modify', 'date_create'],'date', 'format'=>'Y-MM-dd HH:mm'],
        	// Validation : MySQL
            [['email'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'passwordConfirm' => Yii::t('app', 'Password Confirm'),
            'fullname' => Yii::t('app', 'Fullname'),
            'lang' => Yii::t('app', 'Lang'),
            'is_super_admin' => Yii::t('app', 'Is Super Admin'),
            'added_by_id' => Yii::t('app', 'Admin ID'),
            'date_login' => Yii::t('app', 'Login'),
            'date_modify' => Yii::t('app', 'Modify'),
            'date_create' => Yii::t('app', 'Create'),
            'status_id' => Yii::t('app', 'Status ID'),
        ];
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
    	//return parent::save($runValidation, $attributeNames);
    	return false;
    }
}
