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
        $this->_createTblPostMeta();
        $this->_createTblPosts();
        $this->_createTblTermRelationships();
        $this->_createTblTermTaxonomy();
        $this->_createTblTermMeta();
        $this->_createTblTerms();
        $this->_createTblUserMeta();
    }

    public function down()
    {
        $this->dropTable("{{%comment_meta}}");
        $this->dropTable("{{%comments}}");
        $this->dropTable("{{%options}}");
        $this->dropTable("{{%post_meta}}");
        $this->dropTable("{{%posts}}");
        $this->dropTable("{{%term_relationships}}");
        $this->dropTable("{{%term_taxonomy}}");
        $this->dropTable("{{%term_meta}}");
        $this->dropTable("{{%terms}}");
        $this->dropTable("{{%user_meta}}");
    }

    private function _createTblCommentMeta()
    {
        $this->createTable("{{%comment_meta}}", [
            'meta_id' => $this->primaryKey(),
            'content_id' => $this->integer()->notNull()->defaultValue(0),
            'meta_key' => $this->string(255)->notNull(),
            'meta_value' => $this->text()
        ], $this->_options);
    }

    private function _createTblComments()
    {
        $this->createTable("{{%comments}}", [
            'comment_id' => $this->primaryKey(),
            'comment_post_id' => $this->integer()->notNull()->defaultValue(0),
            'comment_author' => $this->integer()->notNull()->defaultValue(0),
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
            'option_value' => $this->text()->notNull(),
            'autoload' => $this->string(20)->notNull()->defaultValue('yes')
        ], $this->_options);
    }

    private function _createTblPostMeta()
    {
        $this->createTable("{{%post_meta}}", [
            'meta_id' => $this->primaryKey(),
            'post_id' => $this->integer()->defaultValue(0),
            'meta_key' => $this->string(255)->notNull(),
            'meta_value' => $this->text()
        ], $this->_options);
    }

    private function _createTblPosts()
    {
        $this->createTable("{{%posts}}", [
            'id' => $this->primaryKey(),
            'post_author' => $this->integer()->notNull()->defaultValue(0),
            'post_date' => $this->integer(),
            'post_date_gmt' => $this->integer(),
            'post_content' => $this->text(),
            'post_title' => $this->text(),
            'post_excerpt' => $this->text(),
            'post_status' => $this->string(20)->notNull()->defaultValue('publish'),
            'comment_status' => $this->string(20)->notNull()->defaultValue('open'),
            'post_password' => $this->string(20)->defaultValue(''),
            'post_name' => $this->string(255)->notNull()->defaultValue(''),
            'post_modified' => $this->integer(),
            'post_modified_gmt' => $this->integer(),
            'post_content_filtered' => $this->text(),
            'post_parent' => $this->integer()->notNull()->defaultValue(0),
            'guid' => $this->string(255)->notNull()->defaultValue(''),
            'menu_order' => $this->integer()->notNull()->defaultValue(0),
            'post_type' => $this->string(20)->notNull()->defaultValue('post'),
            'post_mime_type' => $this->string(100)->defaultValue(''),
            'comment_count' => $this->integer()->defaultValue(0)
        ], $this->_options);
    }

    private function _createTblTermRelationships()
    {
        $this->createTable("{{%term_relationships}}", [
            'object_id' => $this->primaryKey(),
            'term_taxonomy_id' => $this->integer()->notNull()->defaultValue(0),
            'term_order' => $this->integer()->defaultValue(0)
        ], $this->_options);
    }

    private function _createTblTermTaxonomy()
    {
        $this->createTable("{{%term_taxonomy}}", [
            'term_taxonomy_id' => $this->primaryKey(),
            'term_id' => $this->integer()->notNull()->defaultValue(0),
            'taxonomy' => $this->string(32)->notNull()->defaultValue(''),
            'description' => $this->text(),
            'parent' => $this->integer()->notNull()->defaultValue(0),
            'count' => $this->integer()->defaultValue(0)
        ], $this->_options);
    }

    private function _createTblTermMeta()
    {
        $this->createTable("{{%term_meta}}", [
            'meta_id' => $this->primaryKey(),
            'term_id' => $this->integer()->notNull()->defaultValue(0),
            'meta_key' => $this->string(255)->notNull(),
            'meta_value' => $this->text()
        ], $this->_options);
    }

    private function _createTblTerms()
    {
        $this->createTable("{{%terms}}", [
            'term_id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->defaultValue(''),
            'slug' => $this->string(255)->notNull()->defaultValue(''),
            'term_group' => $this->integer()->defaultValue(0)
        ], $this->_options);
    }

    private function _createTblUserMeta()
    {
        $this->createTable("{{%user_meta}}", [
            'meta_id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull()->defaultValue(0),
            'meta_key' => $this->string(255)->notNull(),
            'meta_value' => $this->text()
        ], $this->_options);
    }
}


