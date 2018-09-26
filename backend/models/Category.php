<?php

namespace backend\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;

/**
 * This is the model class for table "terms".
 *
 * @property int $term_id
 * @property string $name
 * @property string $slug
 * @property int $term_group
 */
class Category extends Terms
{
    public static $flatList;
    public static $treeList;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        $rules = parent::rules();
        return $rules;
    }

    /**
     * {@inheritdoc}
     * @return CategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }

    public static function getFlatList(Terms $term = null, TermTaxonomy $taxonomy = null)
    {
        if (!isset(self::$flatList)) {
            self::buildTermsList($term, $taxonomy);
        }

        return self::$flatList;
    }

    public static function getTreeList(Terms $term = null, TermTaxonomy $taxonomy = null)
    {
        if (!isset(self::$treeList)) {
            self::buildTermsList($term, $taxonomy);
        }

        return self::$treeList;
    }

    protected static function buildTermsList(Terms $term = null, TermTaxonomy $taxonomy = null)
    {
        $categories = self::find()
            ->select(['terms.term_id', 'name', 'level'])
            ->innerJoin(['tax' => TermTaxonomy::tableName()], 'terms.term_id = tax.term_id')
            ->orderBy('tax.parent, tax.level');

        if ($term && $term->term_id) {
            $categories->where("terms.term_id <> {$term->term_id}");
        }

        if ($taxonomy && $taxonomy->term_id) {
            $categories->andWhere("level < {$taxonomy->level}");
        }

        $categories = $categories->asArray()->all();

        if (count($categories)) {
            foreach ($categories as $category) {
                self::$flatList[$category['term_id']] = $category['name'];
                self::$treeList[$category['term_id']] = str_repeat('- ', (int)$category['level']) . $category['name'];
            }
        } else {
            self::$flatList = [];
            self::$treeList = [];
        }
    }
}
