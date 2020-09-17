<?php

namespace MakeItCreative\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Menu helper
 */
class MenuHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * Renvoi le menu
     * @param type $page Identifiant du menu
     * @return array
     */
    public function get($identifiant_menu)
    {
        return ['@TODO'];
    }
}
