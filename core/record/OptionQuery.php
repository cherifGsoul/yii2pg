<?php

namespace app\core\record;

/**
 * This is the ActiveQuery class for [[Option]].
 *
 * @see Option
 */
class OptionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Option[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Option|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}