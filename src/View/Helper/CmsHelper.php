<?php

namespace MakeItCreative\View\Helper;

/**
 * Cms helper
 */
class CmsHelper extends AppHelper
{

    protected $_defaultConfig = [];
    private $_contents = null;

    public function initialize(array $config): void
    {
        parent::initialize($config);

        if (is_null($this->_contents)) {
            $table_contents = \Cake\ORM\TableRegistry::get('MakeItCreative.Contents');
            $this->_contents = $table_contents->find()->contain(['Pages']);
        }
    }

    public function get($champ, $partie = 'page', $page = null, $langue = null)
    {
        //Si la langue n'est pas présicée, pas on prends la langue par défaut
        if (is_null($langue)) {
            $langue = $this->getView()->getRequest()->getParam('langue');
        }
        //Si la page n'est pas précisée, on prends pas page en cours 
        if (is_null($page)) {
            $page = $this->getView()->getRequest()->getParam('page')->identifiant;
        }
        foreach ($this->_contents as $content) {
            if ($content->page->langue == $langue && $content->page->identifiant == $page && $content->partie == $partie && $content->champ == $champ) {
                return $content->content;
            }
        }
        return 'CONTENU INTROUVABLE';
    }
}
