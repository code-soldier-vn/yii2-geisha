<?php

namespace backend\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "terms".
 *
 * @property int $term_id
 * @property string $name
 * @property string $slug
 * @property int $term_group
 */
class Terms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'terms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['term_group'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['slug'], 'unique']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'term_id' => Yii::t('app', 'Term ID'),
            'name' => Yii::t('app', 'Name'),
            'slug' => Yii::t('app', 'Slug'),
            'term_group' => Yii::t('app', 'Term Group'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return TermsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TermsQuery(get_called_class());
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'immutable' => true,
                'ensureUnique' => true
            ]
        ];
    }
}
