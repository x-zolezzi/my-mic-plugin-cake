<?php
namespace MakeItCreative\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use MakeItCreative\Model\Table\KeywordsTable;

/**
 * MakeItCreative\Model\Table\KeywordsTable Test Case
 */
class KeywordsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \MakeItCreative\Model\Table\KeywordsTable
     */
    public $Keywords;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.MakeItCreative.Keywords',
        'plugin.MakeItCreative.Secteurs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Keywords') ? [] : ['className' => KeywordsTable::class];
        $this->Keywords = TableRegistry::getTableLocator()->get('Keywords', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Keywords);

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
