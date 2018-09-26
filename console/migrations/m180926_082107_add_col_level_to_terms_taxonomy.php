<?php

use yii\db\Migration;

/**
 * Class m180926_082107_add_col_level_to_terms_taxonomy
 */
class m180926_082107_add_col_level_to_terms_taxonomy extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn("{{%term_taxonomy}}", 'level', $this->integer()->defaultValue(0));
    }
}
