<?php

namespace app\core\record;

/**
 * This is the ActiveQuery class for [[Taxonomy]].
 *
 * @see Taxonomy
 */
class TaxonomyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Taxonomy[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Taxonomy|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}