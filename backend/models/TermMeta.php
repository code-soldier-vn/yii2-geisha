<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "term_meta".
 *
 * @property int $meta_id
 * @property int $term_id
 * @property string $meta_key
 * @property string $meta_value
 */
class TermMeta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'term_meta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['term_id'], 'integer'],
            [['meta_key'], 'required'],
            [['meta_value'], 'string'],
            [['meta_key'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'meta_id' => Yii::t('app', 'Meta ID'),
            'term_id' => Yii::t('app', 'Term ID'),
            'meta_key' => Yii::t('app', 'Meta Key'),
            'meta_value' => Yii::t('app', 'Meta Value'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return TermMetaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TermMetaQuery(get_called_class());
    }
}
