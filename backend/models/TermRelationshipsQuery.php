<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[TermRelationships]].
 *
 * @see TermRelationships
 */
class TermRelationshipsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TermRelationships[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TermRelationships|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
