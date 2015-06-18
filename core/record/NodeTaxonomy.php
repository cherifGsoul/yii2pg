<?php

namespace app\core\record;

use Yii;

/**
 * This is the model class for table "{{%node_taxonomy}}".
 *
 * @property integer $id
 * @property integer $node_id
 * @property integer $taxonomy_id
 *
 * @property Taxonomy $taxonomy
 * @property Node $node
 */
class NodeTaxonomy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%node_taxonomy}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['node_id', 'taxonomy_id'], 'integer']
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
            'taxonomy_id' => Yii::t('juva', 'Taxonomy ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaxonomy()
    {
        return $this->hasOne(Taxonomy::className(), ['id' => 'taxonomy_id']);
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
     * @return NodeTaxonomyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NodeTaxonomyQuery(get_called_class());
    }
}
