<?php
namespace MakeItCreative\Model\Entity;

use Cake\ORM\Entity;

/**
 * Keyword Entity
 *
 * @property int $id
 * @property string $name
 * @property string $url_slug
 * @property string $presentation
 * @property int $is_active
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \MakeItCreative\Model\Entity\Secteur[] $secteurs
 */
class Keyword extends Entity
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
        'name' => true,
        'url_slug' => true,
        'presentation' => true,
        'is_active' => true,
        'created' => true,
        'modified' => true,
        'secteurs' => true,
    ];
}
