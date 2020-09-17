<?php
namespace MakeItCreative\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use MakeItCreative\Model\Table\CartesTable;

/**
 * MakeItCreative\Model\Table\CartesTable Test Case
 */
class CartesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \MakeItCreative\Model\Table\CartesTable
     */
    public $Cartes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.MakeItCreative.Cartes',
        'plugin.MakeItCreative.Categories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Cartes') ? [] : ['className' => CartesTable::class];
        $this->Cartes = TableRegistry::getTableLocator()->get('Cartes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cartes);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
