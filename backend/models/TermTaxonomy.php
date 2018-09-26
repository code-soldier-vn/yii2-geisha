<?php

namespace backend\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;

/**
 * This is the model class for table "term_taxonomy".
 *
 * @property int $term_taxonomy_id
 * @property int $term_id
 * @property string $taxonomy
 * @property string $description
 * @property int $parent
 * @property int $count
 */
class TermTaxonomy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'term_taxonomy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['term_id', 'parent', 'count'], 'integer'],
            [['description'], 'string'],
            [['taxonomy'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'term_taxonomy_id' => Yii::t('app', 'Term Taxonomy ID'),
            'term_id' => Yii::t('app', 'Term ID'),
            'taxonomy' => Yii::t('app', 'Taxonomy'),
            'description' => Yii::t('app', 'Description'),
            'parent' => Yii::t('app', 'Parent'),
            'count' => Yii::t('app', 'Count'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return TermTaxonomyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TermTaxonomyQuery(get_called_class());
    }

    public function getTerm()
    {
        return $this->hasOne(Terms::className(), ['term_id' => 'term_id']);
    }

    public function behaviors()
    {
        return [
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['level'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['level'],
                ],
                'value' => function () {
                    $level = 0;
                    if ('category' === $this->taxonomy) {
                        try {
                            if ($parent = TermTaxonomy::findOne(['term_id' => $this->parent])) {
                                /** @var TermTaxonomy $parent */
                                $level = (int)$parent->level + 1;
                            }
                        } catch (NotFoundHttpException $e) {
                            // Ignore this exception.
                        }
                    }

                    return $level;
                }
            ]
        ];
    }
}
