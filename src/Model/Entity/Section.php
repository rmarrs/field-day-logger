<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Section Entity
 *
 * @property string $abbr
 * @property string $area
 * @property string $description
 */
class Section extends Entity
{

    protected $_virtual = ['label'];

    protected function _getLabel()
    {
        return $this->_properties['abbr'] . ' - ' . $this->_properties['description'];
    }   

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
        'abbr' => false
    ];
}
