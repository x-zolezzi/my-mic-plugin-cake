<?php

namespace MakeItCreative\View\Helper;

/**
 * Langue helper
 */
class LangueHelper extends AppHelper
{

    private $_langues = null;

    public function initialize(array $config): void
    {
        parent::initialize($config);

        if (!is_null($this->getView()->getRequest()->getParam('langue'))) {
            $this->getView()->getRequest()->getSession()->write('current_langue', $this->getView()->getRequest()->getParam('langue'));
        }

        if (is_null($this->_langues)) {
            $table_langues = \Cake\ORM\TableRegistry::get('MakeItCreative.Langues');
            $this->_langues = $table_langues->find('list', [
                'keyField' => 'id',
                'valueField' => 'name'
            ])->toArray();
        }
    }

    public function all()
    {
        return $this->_langues;
    }

    public function current()
    {
        if ($this->getView()->getRequest()->getParam('langue') && !is_null($this->_langues) && isset($this->_langues[$this->getView()->getRequest()->getParam('langue')])) {
            return $this->getView()->getRequest()->getParam('langue');
        } else {
            return null;
        }
    }

    public function defaut()
    {
        $table_infos = \Cake\ORM\TableRegistry::get('MakeItCreative.Infos');
        $default_langue = $table_infos->find()->where(['Infos.id' => 'default_langue'])->first();

        if (!is_null($default_langue)) {
            return $default_langue->value;
        } else {
            return null;
        }
    }
}
