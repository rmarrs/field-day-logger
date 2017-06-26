<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BandsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BandsTable Test Case
 */
class BandsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BandsTable
     */
    public $Bands;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bands'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Bands') ? [] : ['className' => BandsTable::class];
        $this->Bands = TableRegistry::get('Bands', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bands);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
