<?php

namespace app\core\record;

use Yii;

/**
 * This is the model class for table "{{%taxonomy}}".
 *
 * @property integer $id
 * @property string $guid
 * @property string $title
 * @property string $description
 * @property string $type
 * @property string $slug
 * @property integer $root
 * @property integer $lft
 * @property integer $rgt
 * @property integer $level
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property NodeTaxonomy[] $nodeTaxonomies
 */
class Taxonomy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%taxonomy}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'lft', 'rgt', 'level'], 'required'],
            [['description'], 'string'],
            [['root', 'lft', 'rgt', 'level', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['guid', 'title', 'type', 'slug'], 'string', 'max' => 255]
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
            'description' => Yii::t('juva', 'Description'),
            'type' => Yii::t('juva', 'Type'),
            'slug' => Yii::t('juva', 'Slug'),
            'root' => Yii::t('juva', 'Root'),
            'lft' => Yii::t('juva', 'Lft'),
            'rgt' => Yii::t('juva', 'Rgt'),
            'level' => Yii::t('juva', 'Level'),
            'created_at' => Yii::t('juva', 'Created At'),
            'updated_at' => Yii::t('juva', 'Updated At'),
            'created_by' => Yii::t('juva', 'Created By'),
            'updated_by' => Yii::t('juva', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNodeTaxonomies()
    {
        return $this->hasMany(NodeTaxonomy::className(), ['taxonomy_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return TaxonomyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TaxonomyQuery(get_called_class());
    }
}
