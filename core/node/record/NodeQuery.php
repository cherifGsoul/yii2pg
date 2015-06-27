<?php

namespace app\core\node\record;

use creocoder\nestedsets\NestedSetsQueryBehavior;

/**
 * This is the ActiveQuery class for [[Node]].
 *
 * @see Node
 */
class NodeQuery extends \yii\db\ActiveQuery
{
    public $type;


    public function prepare($builder)
    {
        if ($this->type !== null) {
            $this->andWhere(['type' => $this->type]);
        }
        return parent::prepare($builder);
    }

    public function behaviors() {
        return [
            NestedSetsQueryBehavior::className(),
        ];
    }

    public function published()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }

    /**
     * @inheritdoc
     * @return Node[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Node|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}