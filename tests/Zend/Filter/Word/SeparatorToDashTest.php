<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Filter
 * @subpackage UnitTests
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id$
 */

// Call Zend_Filter_SeparatorToDashTest::main() if this source file is executed directly.
if (!defined("PHPUnit_MAIN_METHOD")) {
    define("PHPUnit_MAIN_METHOD", "Zend_Filter_Word_SeparatorToDashTest::main");
}


require_once 'Zend/Filter/Word/SeparatorToDash.php';

/**
 * Test class for Zend_Filter_Word_SeparatorToDash.
 *
 * @category   Zend
 * @package    Zend_Filter
 * @subpackage UnitTests
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @group      Zend_Filter
 */
class Zend_Filter_Word_SeparatorToDashTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Runs the test methods of this class.
     *
     * @access public
     * @static
     */
    public static function main()
    {

        $suite  = new \PHPUnit\Framework\TestSuite("Zend_Filter_Word_SeparatorToDashTest");
        $result = \PHPUnit\TextUI\TestRunner::run($suite);
    }

    public function testFilterSeparatesDashedWordsWithDefaultSpaces()
    {
        $string   = 'dash separated words';
        $filter   = new Zend_Filter_Word_SeparatorToDash();
        $filtered = $filter->filter($string);

        $this->assertNotEquals($string, $filtered);
        $this->assertEquals('dash-separated-words', $filtered);
    }

    public function testFilterSeparatesDashedWordsWithSomeString()
    {
        $string   = 'dash=separated=words';
        $filter   = new Zend_Filter_Word_SeparatorToDash('=');
        $filtered = $filter->filter($string);

        $this->assertNotEquals($string, $filtered);
        $this->assertEquals('dash-separated-words', $filtered);
    }

}

// Call Zend_Filter_Word_SeparatorToDashTest::main() if this source file is executed directly.
if (\PHPUnit\MAIN\METHOD == "Zend_Filter_Word_SeparatorToDashTest::main") {
    Zend_Filter_Word_SeparatorToDashTest::main();
}
