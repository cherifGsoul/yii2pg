<?php

namespace app\core\record;

use Yii;

/**
 * This is the model class for table "{{%node_field}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $value
 * @property integer $node_id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property Node $node
 */
class NodeField extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%node_field}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'node_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'value'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('juva', 'ID'),
            'name' => Yii::t('juva', 'Name'),
            'value' => Yii::t('juva', 'Value'),
            'node_id' => Yii::t('juva', 'Node ID'),
            'created_at' => Yii::t('juva', 'Created At'),
            'updated_at' => Yii::t('juva', 'Updated At'),
            'created_by' => Yii::t('juva', 'Created By'),
            'updated_by' => Yii::t('juva', 'Updated By'),
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
     * @return NodeFieldQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NodeFieldQuery(get_called_class());
    }
}
