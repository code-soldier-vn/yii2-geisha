<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[TermMeta]].
 *
 * @see TermMeta
 */
class TermMetaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TermMeta[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TermMeta|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
