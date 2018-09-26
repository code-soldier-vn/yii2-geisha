<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "term_relationships".
 *
 * @property int $object_id
 * @property int $term_taxonomy_id
 * @property int $term_order
 */
class TermRelationships extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'term_relationships';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['term_taxonomy_id', 'term_order'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'object_id' => Yii::t('app', 'Object ID'),
            'term_taxonomy_id' => Yii::t('app', 'Term Taxonomy ID'),
            'term_order' => Yii::t('app', 'Term Order'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return TermRelationshipsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TermRelationshipsQuery(get_called_class());
    }
}
