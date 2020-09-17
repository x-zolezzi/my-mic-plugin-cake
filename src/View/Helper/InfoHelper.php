<?php

namespace MakeItCreative\View\Helper;

/**
 * Info helper
 */
class InfoHelper extends AppHelper
{
    private $_infos = null;

    public function initialize(array $config): void
    {
        parent::initialize($config);

        if (is_null($this->_infos)) {
            $table_infos = \Cake\ORM\TableRegistry::get('MakeItCreative.Infos');
            $this->_infos = $table_infos->find('list')->toArray();
        }
    }

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function get($id)
    {
        if (!is_null($this->_infos) && isset($this->_infos[$id])) {
            return $this->_infos[$id];
        } else {
            return 'INFO INTROUVABLE';
        }
    }
}
