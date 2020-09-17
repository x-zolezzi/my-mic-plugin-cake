<?php
namespace MakeitCreative\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use MakeitCreative\View\Helper\TestHelper;

/**
 * MakeitCreative\View\Helper\TestHelper Test Case
 */
class TestHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \MakeitCreative\View\Helper\TestHelper
     */
    public $Test;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Test = new TestHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Test);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
