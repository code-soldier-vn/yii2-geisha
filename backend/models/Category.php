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
    public static $cache;

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
        if (!isset(self::$cache)) {
            self::buildTermsList($term, $taxonomy);
        }

        $flatList = [];

        if (self::$cache) {
            foreach (self::$cache as $catId => $cat) {
                $flatList[$catId] = $cat['name'];
            }
        }

        return $flatList;
    }

    public static function getTreeList(Terms $term = null, TermTaxonomy $taxonomy = null)
    {
        $categories = self::getFlatList($term, $taxonomy);
    }

    protected static function buildTermsList(Terms $term = null, TermTaxonomy $taxonomy = null)
    {
        $categories = self::find()
            ->select(['terms.term_id', 'name', 'level'])
            ->innerJoin(['tax' => TermTaxonomy::tableName()], 'terms.term_id = tax.term_id')
            ->where("taxonomy = 'category'")
            ->orderBy('tax.parent, tax.level');

        if ($term && $term->term_id) {
            $categories->andWhere("terms.term_id <> {$term->term_id}");
        }

        if ($taxonomy && $taxonomy->term_id && $taxonomy->count) {
            $categories->andWhere("level < {$taxonomy->level}");
        }

        $categories = $categories->asArray()->all();

        if (count($categories)) {
            foreach ($categories as $category) {
                self::$cache[$category['term_id']] = $category;
            }
        } else {
            self::$cache = [];
        }
    }
}
