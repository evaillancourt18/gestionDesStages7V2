<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Student Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $student_number
 * @property string $last_name
 * @property string $first_name
 * @property string $phone
 * @property string $info
 * @property float $grade
 * @property bool $actif
 * @property string $slug
 */
class Student extends Entity
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
        'user_id' => true,
        'student_number' => true,
        'last_name' => true,
        'first_name' => true,
        'phone' => true,
        'info' => true,
        'grade' => true,
        'actif' => true,
        'slug' => true,
        'internships' => true
    ];
}
