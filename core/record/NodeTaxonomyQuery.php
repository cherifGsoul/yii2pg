<?php

namespace app\core\record;

/**
 * This is the ActiveQuery class for [[NodeTaxonomy]].
 *
 * @see NodeTaxonomy
 */
class NodeTaxonomyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return NodeTaxonomy[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return NodeTaxonomy|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}