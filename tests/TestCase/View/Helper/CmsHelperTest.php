<?php
namespace MakeItCreative\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use MakeItCreative\View\Helper\CmsHelper;

/**
 * MakeItCreative\View\Helper\CmsHelper Test Case
 */
class CmsHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \MakeItCreative\View\Helper\CmsHelper
     */
    public $Cms;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Cms = new CmsHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cms);

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
