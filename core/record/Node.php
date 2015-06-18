<?php

namespace app\core\record;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\SluggableBehavior;
use creocoder\nestedsets\NestedSetsBehavior;

/**
 * This is the model class for table "{{%node}}".
 *
 * @property integer $id
 * @property string $guid
 * @property string $title
 * @property string $content
 * @property string $excerpt
 * @property string $type
 * @property string $slug
 * @property integer $root
 * @property integer $lft
 * @property integer $rgt
 * @property integer $level
 * @property string $mime_type
 * @property integer $menu_order
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $comment_count
 *
 * @property Comment[] $comments
 * @property NodeField[] $nodeFields
 * @property NodeTaxonomy[] $nodeTaxonomies
 */
class Node extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%node}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'type', 'slug'], 'required'],
            [['content', 'excerpt'], 'string'],
            [['root', 'lft', 'rgt', 'level', 'menu_order', 'status', 'created_by', 'updated_by', 'comment_count'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['guid', 'title', 'type', 'slug', 'mime_type'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('juva', 'ID'),
            'guid' => Yii::t('juva', 'Guid'),
            'title' => Yii::t('juva', 'Title'),
            'content' => Yii::t('juva', 'Content'),
            'excerpt' => Yii::t('juva', 'Excerpt'),
            'type' => Yii::t('juva', 'Type'),
            'slug' => Yii::t('juva', 'Slug'),
            'root' => Yii::t('juva', 'Root'),
            'lft' => Yii::t('juva', 'Lft'),
            'rgt' => Yii::t('juva', 'Rgt'),
            'level' => Yii::t('juva', 'Level'),
            'mime_type' => Yii::t('juva', 'Mime Type'),
            'menu_order' => Yii::t('juva', 'Menu Order'),
            'status' => Yii::t('juva', 'Status'),
            'created_at' => Yii::t('juva', 'Created At'),
            'updated_at' => Yii::t('juva', 'Updated At'),
            'created_by' => Yii::t('juva', 'Created By'),
            'updated_by' => Yii::t('juva', 'Updated By'),
            'comment_count' => Yii::t('juva', 'Comment Count'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['node_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNodeFields()
    {
        return $this->hasMany(NodeField::className(), ['node_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNodeTaxonomies()
    {
        return $this->hasMany(NodeTaxonomy::className(), ['node_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return NodeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NodeQuery(get_called_class());
    }

    public function behaviors()
    {
        return [
            [
                'class'=>TimestampBehavior::className(),
            ],
            [
                 'class' => SluggableBehavior::className(),
                 'attribute' => 'title',
            ],
            [
                'class' => NestedSetsBehavior::className(),
                'treeAttribute' => 'root',
                'depthAttribute' => 'level',
            ],
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    public function beforeValidate() {
        if (parent::beforeValidate()) {
            if(!isset($this->type)) {
                $this->type = 'article';
            }
            return true;
        } else {
            return false;
        }
    }
}
