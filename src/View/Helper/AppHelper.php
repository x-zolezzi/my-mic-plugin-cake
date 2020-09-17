<?php

namespace MakeItCreative\View\Helper;

use Cake\View\Helper;

class AppHelper extends Helper
{

    protected $_page = null;

    public function initialize(array $config): void
    {
        parent::initialize($config);
        if (is_null($this->_page) && !is_null($this->getView()->getRequest()->getParam('id'))) {
            $table_pages = \Cake\ORM\TableRegistry::get('MakeItCreative.Pages');
            $this->_page = $table_pages->find()->where(['Pages.id' => $this->getView()->getRequest()->getParam('id')])->first();
        }
    }
}
