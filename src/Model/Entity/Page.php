<?php
namespace MakeItCreative\Model\Entity;

use Cake\ORM\Entity;

/**
 * Page Entity
 *
 * @property int $id
 * @property int $page_cms_id
 * @property string $identifiant
 * @property string $langue
 * @property string $url
 * @property string $title
 * @property string $h1
 * @property string $description
 * @property string $controller
 * @property string $action
 *
 * @property \MakeItCreative\Model\Entity\Content[] $contents
 */
class Page extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'page_cms_id' => true,
        'identifiant' => true,
        'langue' => true,
        'url' => true,
        'title' => true,
        'h1' => true,
        'description' => true,
        'controller' => true,
        'action' => true,
        'contents' => true,
    ];
}
