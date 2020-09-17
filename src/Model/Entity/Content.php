<?php
namespace MakeItCreative\Model\Entity;

use Cake\ORM\Entity;

/**
 * Content Entity
 *
 * @property int $id
 * @property int $page_id
 * @property string $partie
 * @property string $champ
 * @property string $content
 *
 * @property \MakeItCreative\Model\Entity\Page $page
 */
class Content extends Entity
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
        'page_id' => true,
        'partie' => true,
        'champ' => true,
        'content' => true,
        'page' => true,
    ];
}
