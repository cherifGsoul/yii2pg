<?php

namespace app\core\record;

use Yii;

/**
 * This is the model class for table "{{%comment}}".
 *
 * @property integer $id
 * @property integer $node_id
 * @property string $content
 * @property string $author_name
 * @property string $author_email
 * @property string $author_url
 * @property integer $approved
 * @property integer $author_id
 *
 * @property Node $node
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%comment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['node_id', 'approved', 'author_id'], 'integer'],
            [['content'], 'string'],
            [['author_name', 'author_email', 'author_url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('juva', 'ID'),
            'node_id' => Yii::t('juva', 'Node ID'),
            'content' => Yii::t('juva', 'Content'),
            'author_name' => Yii::t('juva', 'Author Name'),
            'author_email' => Yii::t('juva', 'Author Email'),
            'author_url' => Yii::t('juva', 'Author Url'),
            'approved' => Yii::t('juva', 'Approved'),
            'author_id' => Yii::t('juva', 'Author ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNode()
    {
        return $this->hasOne(Node::className(), ['id' => 'node_id']);
    }

    /**
     * @inheritdoc
     * @return CommentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommentQuery(get_called_class());
    }
}
