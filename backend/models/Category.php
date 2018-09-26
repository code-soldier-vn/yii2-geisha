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
}
