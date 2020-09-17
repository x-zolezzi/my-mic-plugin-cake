<?php
namespace MakeItCreative\Model\Entity;

use Cake\ORM\Entity;

/**
 * KeywordsSecteur Entity
 *
 * @property int $id
 * @property int $secteur_id
 * @property int $keyword_id
 * @property string $url_slug
 *
 * @property \MakeItCreative\Model\Entity\Secteur $secteur
 * @property \MakeItCreative\Model\Entity\Keyword $keyword
 */
class KeywordsSecteur extends Entity
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
        'secteur_id' => true,
        'keyword_id' => true,
        'url_slug' => true,
        'secteur' => true,
        'keyword' => true,
    ];
}
