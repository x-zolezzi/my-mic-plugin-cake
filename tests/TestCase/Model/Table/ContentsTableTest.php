<?php
namespace MakeItCreative\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use MakeItCreative\Model\Table\ContentsTable;

/**
 * MakeItCreative\Model\Table\ContentsTable Test Case
 */
class ContentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \MakeItCreative\Model\Table\ContentsTable
     */
    public $Contents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.MakeItCreative.Contents',
        'plugin.MakeItCreative.Pages',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Contents') ? [] : ['className' => ContentsTable::class];
        $this->Contents = TableRegistry::getTableLocator()->get('Contents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Contents);

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
