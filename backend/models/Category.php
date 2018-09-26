<?php

namespace backend\models;

use Yii;

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

    public static function getFlatList(Terms $term = null)
    {
        if (!isset(self::$flatList)) {
            $categories = self::find()
                ->select(['terms.term_id', 'name', 'parent'])
                ->innerJoin(['tax' => TermTaxonomy::tableName()], 'terms.term_id = tax.term_id')
                ->orderBy('tax.parent')
                ->asArray()
                ->all();

            if (count($categories)) {
                foreach ($categories as $category) {
                    self::$flatList[$category['term_id']] = $category;
                }
            } else {
                self::$flatList = [];
            }
        }

        return self::$flatList;
    }

    
}
