<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Proposition Entity.
 *
 * @property int $id
 * @property string $libelle_fr
 * @property string $libelle_en
 * @property int $categorie_id
 * @property \App\Model\Entity\Categorie $categorie
 * @property int $acceptation
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Proposition extends Entity
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
        '*' => true,
        'id' => false,
    ];
}
