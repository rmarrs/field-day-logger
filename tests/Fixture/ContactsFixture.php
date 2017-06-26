<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ContactsFixture
 *
 */
class ContactsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'callsign' => ['type' => 'string', 'length' => 8, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'class' => ['type' => 'string', 'fixed' => true, 'length' => 2, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'sections_abbr' => ['type' => 'string', 'fixed' => true, 'length' => 3, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'station' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'operator_callsign' => ['type' => 'string', 'length' => 6, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'bands_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'modes_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_contacts_sections_idx' => ['type' => 'index', 'columns' => ['sections_abbr'], 'length' => []],
            'fk_contacts_bands1_idx' => ['type' => 'index', 'columns' => ['bands_id'], 'length' => []],
            'fk_contacts_modes1_idx' => ['type' => 'index', 'columns' => ['modes_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id', 'bands_id', 'modes_id'], 'length' => []],
            'fk_contacts_bands1' => ['type' => 'foreign', 'columns' => ['bands_id'], 'references' => ['bands', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_contacts_modes1' => ['type' => 'foreign', 'columns' => ['modes_id'], 'references' => ['modes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_contacts_sections' => ['type' => 'foreign', 'columns' => ['sections_abbr'], 'references' => ['sections', 'abbr'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'callsign' => 'Lorem ',
            'class' => '',
            'sections_abbr' => 'L',
            'station' => 'Lorem ipsum dolor sit amet',
            'operator_callsign' => 'Lore',
            'bands_id' => 1,
            'modes_id' => 1
        ],
    ];
}
