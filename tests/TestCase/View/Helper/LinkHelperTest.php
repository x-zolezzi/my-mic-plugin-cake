<?php
namespace MakeItCreative\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use MakeItCreative\View\Helper\LinkHelper;

/**
 * MakeItCreative\View\Helper\LinkHelper Test Case
 */
class LinkHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \MakeItCreative\View\Helper\LinkHelper
     */
    public $Link;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Link = new LinkHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Link);

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
