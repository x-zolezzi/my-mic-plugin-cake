<?php

namespace MakeItCreative\View\Helper;

use Cake\View\Helper;

/**
 * Page helper
 */
class PageHelper extends Helper
{

    protected $_defaultConfig = [];

    public function initialize(array $config): void
    {
        parent::initialize($config);
    }

    public function id()
    {
        if (!is_null($this->getView()->getRequest()->getParam('page'))) {
            return $this->getView()->getRequest()->getParam('page')->id;
        }

        return null;
    }

    public function identifiant()
    {
        if (!is_null($this->getView()->getRequest()->getParam('page'))) {
            return $this->getView()->getRequest()->getParam('page')->identifiant;
        }

        return null;
    }

    public function title()
    {
        if (!is_null($this->getView()->getRequest()->getParam('page'))) {
            return $this->getView()->getRequest()->getParam('page')->title;
        }

        return null;
    }

    public function description()
    {
        if (!is_null($this->getView()->getRequest()->getParam('page'))) {
            return $this->getView()->getRequest()->getParam('page')->description;
        }

        return null;
    }

    public function head()
    {
        if (!is_null($this->getView()->getRequest()->getParam('page'))) {
            $head = '<title>' . $this->getView()->getRequest()->getParam('page')->title . '</title>' . "\n\r" . "\t\t";
            $head .= '<meta name="description" content="' . $this->getView()->getRequest()->getParam('page')->description . '"/>' . "\n\r" . "\t\t";
            $head .= '<meta name="robots" content="noodp" />' . "\n\r" . "\t\t";

            //        $head .= '<link rel="canonical" href="http://www.makeitcreative.fr/" />' . "\n\r" . "\t\t";
            //
            //        $head .= '<link href="/favicon.ico" type="image/x-icon" rel="icon" /><link href="/favicon.ico" type="image/x-icon" rel="shortcut icon" />        <meta name="twitter:card" content="summary" />' . "\n\r" . "\t\t";
            //        $head .= '<meta name="twitter:site" content="@makeitcreative_" />' . "\n\r" . "\t\t";
            //        $head .= '<meta name="twitter:creator" content="@makeitcreative_" />' . "\n\r" . "\t\t";
            //        $head .= '<meta name="twitter:title" content="Agence Web Marseille, création de site internet avec MAKE IT CREATIVE" />' . "\n\r" . "\t\t";
            //        $head .= '<meta name="twitter:url" content="http://www.makeitcreative.fr/" />' . "\n\r" . "\t\t";
            //        $head .= '<meta name="twitter:description" content="Agence Web sur Marseille. Nous mettons toutes notre expertise et notre créativité au service de vos projets : création site internet, e-commerce, référencement" />' . "\n\r" . "\t\t";
            //        $head .= '<meta name="twitter:image" content="http://makeitcreative.fr/img/logo.png" />' . "\n\r" . "\t\t";
            //
            //
            //        $head .= '<meta property="og:title" content="Agence Web Marseille, création de site internet avec MAKE IT CREATIVE" />' . "\n\r" . "\t\t";
            //        $head .= '<meta property="og:type" content="website" />' . "\n\r" . "\t\t";
            //        $head .= '<meta property="og:url" content="http://www.makeitcreative.fr/" />' . "\n\r" . "\t\t";
            //        $head .= '<meta property="og:image" content="http://makeitcreative.fr/img/logo.png" />' . "\n\r" . "\t\t";
            //        $head .= '<meta property="og:image:type" content="image/png" />' . "\n\r" . "\t\t";
            //        $head .= '<meta property="og:image:width" content="120" />' . "\n\r" . "\t\t";
            //        $head .= '<meta property="og:image:height" content="76" />' . "\n\r" . "\t\t";
            //        $head .= '<meta property="og:description" content="Agence Web sur Marseille. Nous mettons toutes notre expertise et notre créativité au service de vos projets : création site internet, e-commerce, référencement" />' . "\n\r" . "\t\t";
            //
            //        $head .= '<meta name="DC.title" lang="fr" content="Agence Web Marseille, création de site internet avec MAKE IT CREATIVE">' . "\n\r" . "\t\t";
            //        $head .= '<meta name="DC.description" lang="fr" content="Agence Web sur Marseille. Nous mettons toutes notre expertise et notre créativité au service de vos projets : création site internet, e-commerce, référencement">' . "\n\r" . "\t\t";
            //        $head .= '<meta name="DC.language" content="fr-FR">' . "\n\r" . "\t\t";
            //        $head .= '<meta name="DC.creator" content="MAKE IT CREATIVE">' . "\n\r" . "\t\t";

            return $head;
        }

        return null;
    }
}
