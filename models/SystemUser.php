<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "system_user".
 *
 * @property int $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property string $created_at
 * @property string $updated_at
 * @property int $status
 * @property string $role
 * @property string $fullname
 * @property string $cid
 */
class SystemUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $password;
    public static function tableName()
    {
        return 'system_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'cid','fullname'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['status'], 'integer'],
            [['username','password'], 'string', 'max' => 20],
            [['password_hash', 'auth_key'], 'string', 'max' => 128],
            [['password_reset_token', 'fullname'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 100],
            [['role'], 'string', 'max' => 30],
            [['cid'], 'string', 'max' => 13],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'auth_key' => 'Auth Key',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'role' => 'ระกับการเข้าใช้งาน',
            'password'=>'password',
            'fullname' => 'ชื่อ-สกุล',
            'cid' => 'Cid',
        ];
    }
    
      public function beforeSave($insert) {
        date_default_timezone_set('Asia/Bangkok');
        if (parent::beforeSave($insert)) { {
                if ($this->isNewRecord) {
                    $this->password_hash = \Yii::$app->security->generatePasswordHash($this->password);
                    $this->password_reset_token = '';
                    $this->auth_key = \Yii::$app->security->generateRandomString();
                    $this->status = 10;
                    $this->created_at = date('y-m-d G:i:s');
                    $this->updated_at = date('y-m-d G:i:s');
                } else {
                    if ($this->password <> '') {
                        $this->password_hash = Yii::$app->security->generatePasswordHash($this->password);
                        $this->updated_at = date('y-m-d G:i:s');
                    }
                }
            }
            return true;
        } else {
            return false;
        }
    }
}
