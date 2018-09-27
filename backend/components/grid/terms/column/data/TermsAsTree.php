<?php

namespace backend\components\grid\terms\column\data;

use backend\components\helpers\terms\ListHelper;
use backend\models\Terms;
use backend\models\TermTaxonomy;

class TermsAsTree
{
    private $_term;
    private $_taxonomy;

    public function __construct(Terms $term = null, TermTaxonomy $taxonomy = null)
    {
        $this->_term = $term;
        $this->_taxonomy = $taxonomy;
    }

    public function getData()
    {
        $helper = ListHelper::getInstance($this->_term, $this->_taxonomy);
        $tree = $helper->getTree();
        $data = [];

        foreach ($tree as $item) {
            $data[$item['term_id']] = str_repeat('- ', (int)$item['level']) . $item['name'];
        }

        return $data;
    }
}
