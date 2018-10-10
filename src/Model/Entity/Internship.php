<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Internship Entity
 *
 * @property int $id
 * @property string $title
 * @property string $address
 * @property string $city
 * @property string $province
 * @property string $postal_code
 * @property string $administrative_region
 * @property string $slug
 * @property bool $actif
 * @property int $supervisor_id
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property string $building_type
 *
 * @property \App\Model\Entity\Supervisor $supervisor
 * @property \App\Model\Entity\Mission[] $missions
 * @property \App\Model\Entity\Type[] $types
 */
class Internship extends Entity
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
        'title' => true,
        'address' => true,
        'city' => true,
        'province' => true,
        'postal_code' => true,
        'administrative_region' => true,
        'slug' => true,
        'actif' => true,
        'supervisor_id' => true,
        'created' => true,
        'modified' => true,
        'buildingType_id' => true,
        'description' => true,
        'supervisor' => true,
        'missions' => true,
        'types' => true
    ];
}
