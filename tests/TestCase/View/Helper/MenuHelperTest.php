<?php
namespace MakeItCreative\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use MakeItCreative\View\Helper\MenuHelper;

/**
 * MakeItCreative\View\Helper\MenuHelper Test Case
 */
class MenuHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \MakeItCreative\View\Helper\MenuHelper
     */
    public $Menu;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Menu = new MenuHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Menu);

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
