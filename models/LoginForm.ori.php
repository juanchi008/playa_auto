<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class LoginForm extends Model
{
    public $nombre_usuario;
    public $contrasena;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // nombre_usuario and contrasena are both required
            [['nombre_usuario', 'contrasena'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // contrasena is validated by validatePassword()
            ['contrasena', 'validatePassword'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
    	return [
    			'nombre_usuario' => 'Usuario',
    			'rememberMe' => 'Recordarme',
    			'contrasena' => 'Contraseña',
    	];
    }
    /**
     * Validates the contrasena.
     * This method serves as the inline validation for contrasena.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->contrasena)) {
                $this->addError($attribute, 'Nombre de Usuario o Contraseña Incorrecta');
            }
        }
    }

    /**
     * Logs in a user using the provided nombre_usuario and contrasena.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[nombre_usuario]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->nombre_usuario);
        }

        return $this->_user;
    }
}
