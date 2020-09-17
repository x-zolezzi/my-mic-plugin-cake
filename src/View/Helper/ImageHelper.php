<?php

namespace MakeItCreative\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Cake\Utility\Security;
use League\Glide\Urls\UrlBuilderFactory;

/**
 * Image helper
 */
class ImageHelper extends Helper
{

    /**
     * Helpers used by this helper.
     *
     * @var array
     */
    public $helpers = ['Html'];

    /**
     * Default config for this helper.
     *
     * Valid keys:
     * - `baseUrl`: Base URL. Default '/images/'.
     * - `secureUrls`: Whether to generate secure URLs. Default `false`.
     * - `signKey`: Signing key to use when generating secure URLs. If empty
     *   value of `Security::salt()` will be used. Default `null`.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'baseUrl' => '/images/',
        'secureUrls' => true,
        'signKey' => null,
    ];

    /**
     * URL builder.
     *
     * @var \League\Glide\Urls\UrlBuilder|null
     */
    protected $_urlBuilder;

    /**
     * Webroot.
     *
     * @var bool
     */
    protected $_webroot;

    /**
     * Initialize hook
     *
     * @param array $config Config
     * @return void
     */
    public function initialize(array $config): void
    {
        if (method_exists($this->_View, 'getRequest')) {
            $this->_webroot = $this->_View->getRequest()->getAttribute('webroot');
        } else {
            $this->_webroot = $this->request->getAttribute('webroot');
        }
    }

    /**
     * Creates a formatted IMG element.
     *
     * @param string $path Image path.
     * @param array $params Image manipulation parameters.
     * @param array $options Array of HTML attributes for image tag.
     *
     * @return string Complete <img> tag.
     *
     * @see http://glide.thephpleague.com/1.0/api/quick-reference/
     */
    public function img($path, array $params = [], array $options = [])
    {
        return $this->Html->image(
            $this->url($path, $params + ['_base' => false]),
            $options
        );
    }

    /**
     * Creates a formatted IMG element.
     *
     * @param string $path Image path.
     * @param array $params Image manipulation parameters.
     * @param array $options Array of HTML attributes for image tag.
     *
     * @return string Complete <img> tag.
     *
     * @see http://glide.thephpleague.com/1.0/api/quick-reference/
     */
    public function picture($path, array $params = [], array $options = [])
    {
        $params_webp = $params;
        $params_webp['fm'] = 'webp';
        $params_jpeg = $params;
        $params_jpeg['fm'] = 'jpeg';
        return '<picture>
  <source srcset="' . $this->url($path, $params_webp) . '" type="image/webp">
  <source srcset="' . $this->url($path, $params_jpeg) . '" type="image/jpeg"> 
  ' . $this->img($path, $params) . '
</picture>@TODO';
    }

    /**
     * URL with query string based on resizing params.
     *
     * @param string $path Image path.
     * @param array $params Image manipulation parameters.
     *
     * @return string Image URL.
     *
     * @see http://glide.thephpleague.com/1.0/api/quick-reference/
     */
    public function url($path, array $params = [])
    {
        $base = true;
        if (isset($params['_base'])) {
            $base = $params['_base'];
            unset($params['_base']);
        }
        $url = $this->_urlBuilder()->getUrl($path, $params);
        if ($base && strpos($url, 'http') !== 0) {
            $url = $this->_webroot . ltrim($url, '/');
        }

        return $url;
    }

    /**
     * Get URL builder instance.
     *
     * @param \League\Glide\Urls\UrlBuilder|null $urlBuilder URL builder instance to
     *   set or null to get instance.
     *
     * @return \League\Glide\Urls\UrlBuilder URL builder instance.
     */
    private function _urlBuilder($urlBuilder = null)
    {
        if ($urlBuilder !== null) {
            return $this->_urlBuilder = $urlBuilder;
        }

        if (!isset($this->_urlBuilder)) {
            $config = $this->getConfig();

            $this->_urlBuilder = UrlBuilderFactory::create(
                $config['baseUrl'],
                $config['secureUrls'] ? ($config['signKey'] ?: Security::getSalt()) : null
            );
        }

        return $this->_urlBuilder;
    }
}
