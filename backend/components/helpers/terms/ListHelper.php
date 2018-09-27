<?php

namespace backend\components\helpers\terms;

use backend\models\Terms;
use backend\models\TermTaxonomy;

class ListHelper
{
    private static $instance = null;
    private $_list;
    private $_tree;
    private $_term;
    private $_taxonomy;

    public static function getInstance(Terms $term = null, TermTaxonomy $taxonomy = null)
    {
        if (!self::$instance) {
            self::$instance = new ListHelper($term, $taxonomy);
        }

        return self::$instance;
    }

    public function __construct(Terms $term = null, TermTaxonomy $taxonomy = null)
    {
        $this->_term = $term;
        $this->_taxonomy = $taxonomy;
        $this->_list = $this->_load();
        $this->_tree = $this->_sortAsTree();
    }

    public function getList()
    {
        return $this->_list;
    }

    public function getTree()
    {
        return $this->_tree;
    }

    private function _sortAsTree()
    {
        $tree = [];
        $total = count($this->_list);

        if ($total) {
            foreach ($this->_list as $id => $category) {
                $parent = (int)$category['parent'];
                $level = (int)$category['level'];
                $count = (int)$category['count'];

                if ($parent) {
                    $id = ($parent * $count) + $total + $id;
                }

                $tree[$id] = $category;
            }
        }
        sort($tree);

        return $tree;
    }

    private function _load()
    {
        $categories = Terms::find()
            ->select(['terms.term_id', 'name', 'level', 'parent', 'count'])
            ->innerJoin(['tax' => TermTaxonomy::tableName()], 'terms.term_id = tax.term_id')
            ->orderBy('tax.parent');

        if ($this->_term && $this->_term->term_id) {
            $categories->where("terms.term_id <> {$this->_term->term_id}");
        }

        if ($this->_taxonomy && $this->_taxonomy->term_id && $this->_taxonomy->count) {
            $categories->andWhere("level < {$this->_taxonomy->level}");
        }

        return $categories->indexBy('term_id')->asArray()->all();
    }
}