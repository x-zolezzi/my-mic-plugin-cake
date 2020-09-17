<?php

use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;
use MakeItCreative\Middleware\GlideMiddleware;

Router::scope('/images', function ($routes) {
    $routes->registerMiddleware('glide', new GlideMiddleware([
        // Run this filter only for URLs starting with specified string. Default null.
        // Setting this option is required only if you want to setup the middleware
        // in Application::middleware() instead of using router's scoped middleware.
        // It would normally be set to same value as that of server.base_url below.
        'path' => null,

        // Either a callable which returns an instance of League\Glide\Server
        // or config array to be used to create server instance.
        // http://glide.thephpleague.com/1.0/config/setup/
        'server' => [
            // Path or League\Flysystem adapter instance to read images from.
            // http://glide.thephpleague.com/1.0/config/source-and-cache/
            'source' => WWW_ROOT . 'img-upload',

            // Path or League\Flysystem adapter instance to write cached images to.
            'cache' => WWW_ROOT . 'img-cache',

            // URL part to be omitted from source path. Defaults to "/images/"
            // http://glide.thephpleague.com/1.0/config/source-and-cache/#set-a-base-url
            'base_url' => '/images/',

            // Response class for serving images. If unset (default) an instance of
            // \MakeItCreative\Responses\PsrResponseFactory() will be used.
            // http://glide.thephpleague.com/1.0/config/responses/
            'response' => null,
        ],

        // http://glide.thephpleague.com/1.0/config/security/
        'security' => [
            // Boolean indicating whether secure URLs should be used to prevent URL
            // parameter manipulation. Default false.
            'secureUrls' => false,

            // Signing key used to generate / validate URLs if `secureUrls` is `true`.
            // If unset value of Cake\Utility\Security::salt() will be used.
            'signKey' => null,
        ],

        // Cache duration. Default '+1 days'.
        'cacheTime' => '+1 days',

        // Any response headers you may want to set. Default null.
        'headers' => [
            'X-Custom' => 'some-value',
        ]
    ]));

    $routes->applyMiddleware('glide');

    $routes->connect('/*');
});

Router::scope('/', function (RouteBuilder $routes) {
    $table_pages = \Cake\ORM\TableRegistry::get('MakeItCreative.Pages');
    $pages = $table_pages->find(); //@TODO: Cache

    $table_infos = \Cake\ORM\TableRegistry::get('MakeItCreative.Infos'); //@TODO: Cache

    $page_introuvable = null;
    $info_page_introuvable = $table_infos->find()->where(['Infos.id' => 'page_introuvable'])->first(); //@TODO: Cache

    $default_langue = $table_infos->find()->where(['Infos.id' => 'default_langue'])->first(); //@TODO: Cache
    if (is_null($default_langue)) {
        $default_langue = 'fr';
    } else {
        $default_langue = $default_langue->value;
    }

    session_start();
    if (isset($_SESSION['current_langue'])) {
        $current_langue = $_SESSION['current_langue'];
    } else {
        $current_langue = $default_langue;
    }

    foreach ($pages as $page) {
        $prefix_langue = '';
        if ($page->langue != $default_langue) {
            $prefix_langue = $page->langue . '/';
        }

        if (!is_null($info_page_introuvable) && $page->page_cms_id == $info_page_introuvable->value) {
            $page_introuvable = $page;
        }

        $routes->connect(
            '/' . $prefix_langue . $page->url . (!empty($page->url) ? '/*' : ''),
            ['controller' => $page->controller, 'action' => $page->action, 'langue' => $page->langue, 'id' => $page->id, 'page' => $page],
            ['_name' => $page->langue . '_' . $page->identifiant . '_' . $page->page_cms_id]
        );
    }

    if (!is_null($page_introuvable)) {
        $routes->connect(
            '/*',
            ['controller' => $page_introuvable->controller, 'action' => $page_introuvable->action, 'langue' => $current_langue, 'id' => $page_introuvable->id, 'page' => $page],
            ['_name' => $default_langue . '_page_introuvable']
        );
    }
    $routes->fallbacks(DashedRoute::class);
});
