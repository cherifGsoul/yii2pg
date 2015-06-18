<?php

namespace app\core\record;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('juva', 'ID'),
            'username' => Yii::t('juva', 'Username'),
            'auth_key' => Yii::t('juva', 'Auth Key'),
            'password_hash' => Yii::t('juva', 'Password Hash'),
            'password_reset_token' => Yii::t('juva', 'Password Reset Token'),
            'email' => Yii::t('juva', 'Email'),
            'status' => Yii::t('juva', 'Status'),
            'created_at' => Yii::t('juva', 'Created At'),
            'updated_at' => Yii::t('juva', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
