<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property int $post_author
 * @property int $post_date
 * @property int $post_date_gmt
 * @property string $post_content
 * @property string $post_title
 * @property string $post_excerpt
 * @property string $post_status
 * @property string $comment_status
 * @property string $post_password
 * @property string $post_name
 * @property int $post_modified
 * @property int $post_modified_gmt
 * @property string $post_content_filtered
 * @property int $post_parent
 * @property string $guid
 * @property int $menu_order
 * @property string $post_type
 * @property string $post_mime_type
 * @property int $comment_count
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_author', 'post_date', 'post_date_gmt', 'post_modified', 'post_modified_gmt', 'post_parent', 'menu_order', 'comment_count'], 'integer'],
            [['post_content', 'post_title', 'post_excerpt', 'post_content_filtered'], 'string'],
            [['post_status', 'comment_status', 'post_password', 'post_type'], 'string', 'max' => 20],
            [['post_name', 'guid'], 'string', 'max' => 255],
            [['post_mime_type'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'post_author' => Yii::t('app', 'Post Author'),
            'post_date' => Yii::t('app', 'Post Date'),
            'post_date_gmt' => Yii::t('app', 'Post Date Gmt'),
            'post_content' => Yii::t('app', 'Post Content'),
            'post_title' => Yii::t('app', 'Post Title'),
            'post_excerpt' => Yii::t('app', 'Post Excerpt'),
            'post_status' => Yii::t('app', 'Post Status'),
            'comment_status' => Yii::t('app', 'Comment Status'),
            'post_password' => Yii::t('app', 'Post Password'),
            'post_name' => Yii::t('app', 'Post Name'),
            'post_modified' => Yii::t('app', 'Post Modified'),
            'post_modified_gmt' => Yii::t('app', 'Post Modified Gmt'),
            'post_content_filtered' => Yii::t('app', 'Post Content Filtered'),
            'post_parent' => Yii::t('app', 'Post Parent'),
            'guid' => Yii::t('app', 'Guid'),
            'menu_order' => Yii::t('app', 'Menu Order'),
            'post_type' => Yii::t('app', 'Post Type'),
            'post_mime_type' => Yii::t('app', 'Post Mime Type'),
            'comment_count' => Yii::t('app', 'Comment Count'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return PostsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PostsQuery(get_called_class());
    }
}
