<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\components;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $body;
    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['phone', 'safe'],
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            // ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Nombre',
            'email' => 'E-mail',
            'phone' => 'Telefono',
            'subject' => 'Sujeto',
            'body' => 'Mensaje',
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param  string  $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;
        }
        return false;
    }

    /**
     * Sends SMTP email to the specified email address using the information collected by this model.
     * @return boolean whether the model passes validation. If error return STRING
     */
    /*
    public function sendSmtp()
    {
    	$mail = new \ChronoMailer(false, true);
    	$mail->to = Yii::$app->params['adminEmail'];
    	$mail->from = Yii::$app->params['adminEmail'];
    	$mail->AddHeaderBcc('checkermate@hotmail.com');
    	$mail->AddHeaderCc('support@chronomedia.ca');
    	$mail->subject = $this->subject;
    	$mail->message = "".
    		"Name: {$this->name} <br/>".
    		"E-mail: {$this->email} <br/>".
    		"Phone: {$this->phone} <br/>".
    		"<hr/>".
    		$this->body;
    }
    */
}
