<?php

namespace app\core\record;

/**
 * This is the ActiveQuery class for [[NodeField]].
 *
 * @see NodeField
 */
class NodeFieldQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return NodeField[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return NodeField|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}