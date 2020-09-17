<?php
namespace MakeItCreative\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use MakeItCreative\View\Helper\InfoHelper;

/**
 * MakeItCreative\View\Helper\InfoHelper Test Case
 */
class InfoHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \MakeItCreative\View\Helper\InfoHelper
     */
    public $Info;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Info = new InfoHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Info);

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
