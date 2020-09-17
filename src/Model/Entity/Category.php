<?php
namespace MakeItCreative\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity
 *
 * @property int $id
 * @property int|null $category_id
 * @property string $name
 * @property string $url_slug
 * @property string|null $h1
 * @property int $is_active
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \MakeItCreative\Model\Entity\Category[] $categories
 * @property \MakeItCreative\Model\Entity\Carte[] $cartes
 * @property \MakeItCreative\Model\Entity\Tag[] $tags
 */
class Category extends Entity
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
        'category_id' => true,
        'name' => true,
        'url_slug' => true,
        'h1' => true,
        'is_active' => true,
        'created' => true,
        'modified' => true,
        'categories' => true,
        'cartes' => true,
        'tags' => true,
    ];
}
