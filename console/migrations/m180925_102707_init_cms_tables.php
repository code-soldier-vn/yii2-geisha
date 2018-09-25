<?php

use yii\db\Migration;

/**
 * Class m180925_102707_init_cms_tables
 */
class m180925_102707_init_cms_tables extends Migration
{
    private $_options = null;

    public function __construct(array $config = [])
    {
        parent::__construct($config);

        $this->_options = '';
        if ('mysql' === $this->db->driverName) {
            $this->_options = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
    }

    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->_createTblCommentMeta();
        $this->_createTblComments();
        $this->_createTblOptions();
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
    }

    private function _createTblCommentMeta()
    {
        $this->createTable("{{%commentmeta}}", [
            'meta_id' => $this->primaryKey(),
            'content_id' => $this->integer()->notNull()->defaultValue(0),
            'meta_key' => $this->string(255)->notNull(),
            'meta_value' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ], $this->_options);
    }

    private function _createTblComments()
    {
        $this->createTable("{{%comments}}", [
            'comment_id' => $this->primaryKey(),
            'comment_post_id' => $this->integer()->notNull()->defaultValue(0),
            'comment_author' => $this->integer()->notNull(),
            'comment_author_email' => $this->string(100)->notNull(),
            'comment_author_url' => $this->string(100)->notNull()->defaultValue(''),
            'comment_author_ip' => $this->string(100)->notNull()->defaultValue(''),
            'comment_content' => $this->text(),
            'comment_karma' => $this->integer()->notNull()->defaultValue(0),
            'comment_approved' => $this->string(20)->notNull()->defaultValue(''),
            'comment_agent' => $this->string(255)->notNull()->defaultValue(''),
            'comment_type' => $this->string(20)->notNull()->defaultValue(''),
            'comment_parent' => $this->integer()->notNull()->defaultValue(0),
            'user_id' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()

        ], $this->_options);
    }

    private function _createTblOptions()
    {
        $this->createTable("{{%options}}", [
            'option_id' => $this->primaryKey(),
            'option_name' => $this->string(255)->notNull(),
            'option_value' => $this->text()->notNull()->defaultValue(''),
            'autoload' => $this->string(20)->notNull()->defaultValue('yes')
        ], $this->_options);
    }
}
