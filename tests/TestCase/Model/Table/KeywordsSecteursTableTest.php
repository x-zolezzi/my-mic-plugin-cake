<?php
namespace MakeItCreative\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use MakeItCreative\Model\Table\KeywordsSecteursTable;

/**
 * MakeItCreative\Model\Table\KeywordsSecteursTable Test Case
 */
class KeywordsSecteursTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \MakeItCreative\Model\Table\KeywordsSecteursTable
     */
    public $KeywordsSecteurs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.MakeItCreative.KeywordsSecteurs',
        'plugin.MakeItCreative.Secteurs',
        'plugin.MakeItCreative.Keywords',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('KeywordsSecteurs') ? [] : ['className' => KeywordsSecteursTable::class];
        $this->KeywordsSecteurs = TableRegistry::getTableLocator()->get('KeywordsSecteurs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->KeywordsSecteurs);

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
