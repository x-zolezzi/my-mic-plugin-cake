<?php

namespace MakeItCreative\View\Helper;

/**
 * Link helper
 */
class LienHelper extends AppHelper
{

    public $helpers = ['Url'];

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * Renvoi le lien vers une page sinon renvoi #
     * @param type $page Identifiant de la page
     * @param type $langue (Optionnel) Id de la langue du lien souhaité. Sinon langue en cours
     * @return string
     */
    public function get($page, $langue = null)
    {
        if (is_null($langue)) {
            $langue = $this->getView()->getRequest()->getParam('langue');
        }

        $name = $langue . '_' . $page;
        $route_founded = false;
        foreach (\Cake\Routing\Router::routes() as $route) {
            if (isset($route->options['_name']) && $route->options['_name'] == $name) {
                $route_founded = true;
                break;
            }
        }

        if ($route_founded) {
            return $this->Url->build(['_name' => $name]);
        } else {
            return '#';
        }
    }
}
