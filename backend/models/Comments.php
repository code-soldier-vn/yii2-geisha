<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $comment_id
 * @property int $comment_post_id
 * @property int $comment_author
 * @property string $comment_author_email
 * @property string $comment_author_url
 * @property string $comment_author_ip
 * @property string $comment_content
 * @property int $comment_karma
 * @property string $comment_approved
 * @property string $comment_agent
 * @property string $comment_type
 * @property int $comment_parent
 * @property int $user_id
 * @property int $created_at
 * @property int $updated_at
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment_post_id', 'comment_author', 'comment_karma', 'comment_parent', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['comment_author_email', 'user_id'], 'required'],
            [['comment_content'], 'string'],
            [['comment_author_email', 'comment_author_url', 'comment_author_ip'], 'string', 'max' => 100],
            [['comment_approved', 'comment_type'], 'string', 'max' => 20],
            [['comment_agent'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => Yii::t('app', 'Comment ID'),
            'comment_post_id' => Yii::t('app', 'Comment Post ID'),
            'comment_author' => Yii::t('app', 'Comment Author'),
            'comment_author_email' => Yii::t('app', 'Comment Author Email'),
            'comment_author_url' => Yii::t('app', 'Comment Author Url'),
            'comment_author_ip' => Yii::t('app', 'Comment Author Ip'),
            'comment_content' => Yii::t('app', 'Comment Content'),
            'comment_karma' => Yii::t('app', 'Comment Karma'),
            'comment_approved' => Yii::t('app', 'Comment Approved'),
            'comment_agent' => Yii::t('app', 'Comment Agent'),
            'comment_type' => Yii::t('app', 'Comment Type'),
            'comment_parent' => Yii::t('app', 'Comment Parent'),
            'user_id' => Yii::t('app', 'User ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return CommentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommentsQuery(get_called_class());
    }
}
