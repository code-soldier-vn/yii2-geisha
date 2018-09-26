<?php

namespace backend\components\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class AdminMenuWidget extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $html = $this->_beforeWidget();

        if ($list = $this->_getList()) {
            foreach ($list as $menuSlug => $menu) {
                if (isset($menu['label']) && !empty($menu['label'])) {
                    $html .= $this->_beforeMenuItem($menuSlug);
                    $html .= Html::a($this->_getMenuItemText($menu), Url::toRoute("{$menuSlug}/index"), ['class' => 'waves-effect']);
                    $html .= $this->_afterMenuItem();
                }
            }
        }

        $html .= $this->_afterWidget();

        return $html;
    }

    private function _getList()
    {
        return [
            'site' => ['icon' => 'fa fa-home fa-fw', 'label' => \Yii::t('app', 'Dashboard')],
            'posts' => ['icon' => 'fa fa-pencil-square-o fa-fw', 'label' => \Yii::t('app', 'Posts')],
            'post-meta' => ['icon' => 'fa  fa-list-alt fa-fw', 'label' => \Yii::t('app', 'Post meta')],
            'comments' => ['icon' => 'fa fa-comments fa-fw', 'label' => \Yii::t('app', 'Comments')],
            'comment-meta' => ['icon' => 'fa fa-comments-o fa-fw', 'label' => \Yii::t('app', 'Comment meta')],
            'terms' => ['icon' => 'fa fa-archive fa-fw', 'label' => \Yii::t('app', 'Terms')],
            'term-taxonomy' => ['icon' => 'fa fa-cubes fa-fw', 'label' => \Yii::t('app', 'Term taxonomy')],
            'term-relationships' => ['icon' => 'fa fa-code-fork fa-fw', 'label' => \Yii::t('app', 'Term Relationships')],
            'term-meta' => ['icon' => 'fa fa-clipboard fa-fw', 'label' => \Yii::t('app', 'Term meta')],
            'user-meta' => ['icon' => 'fa fa-user-md fa-fw', 'label' => \Yii::t('app', 'User meta')],
            'options' => ['icon' => 'fa fa-cog fa-fw', 'label' => \Yii::t('app', 'Options')],
        ];
    }

    private function _beforeWidget()
    {
        return '<ul class="nav" id="side-menu">';
    }

    private function _afterWidget()
    {
        return '</ul>';
    }

    private function _beforeMenuItem($menuSlug = '')
    {
        $style = [];

        if ('site' === $menuSlug) {
            $style[] = 'padding: 70px 0 0;';
        }

        if (count($style)) {
            return sprintf('<li style="%s">', implode(' ', $style));
        }

        return '<li>';
    }

    private function _afterMenuItem()
    {
        return '</li>';
    }

    private function _getMenuItemText($menuItem)
    {
        $html = '';

        if (isset($menuItem['icon']) && !empty($menuItem['icon'])) {
            $html .= sprintf('<i class="%s" aria-hidden="true"></i>', $menuItem['icon']);
        }

        $html .= $menuItem['label'];

        return $html;
    }
}
