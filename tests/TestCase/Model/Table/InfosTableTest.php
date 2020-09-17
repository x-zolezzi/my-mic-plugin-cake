<?php
namespace MakeItCreative\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use MakeItCreative\Model\Table\InfosTable;

/**
 * MakeItCreative\Model\Table\InfosTable Test Case
 */
class InfosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \MakeItCreative\Model\Table\InfosTable
     */
    public $Infos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.MakeItCreative.Infos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Infos') ? [] : ['className' => InfosTable::class];
        $this->Infos = TableRegistry::getTableLocator()->get('Infos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Infos);

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
