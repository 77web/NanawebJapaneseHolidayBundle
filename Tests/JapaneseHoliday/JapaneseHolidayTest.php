<?php

namespace Nanaweb\JapaneseHolidayBundle\Tests\JapaneseHoliday;

use Nanaweb\JapaneseHolidayBundle\JapaneseHoliday\JapaneseHoliday;

require_once __DIR__.'/../bootstrap.php';

class JapaneseHolidayTest extends \PHPUnit_Framework_TestCase
{
  public function setUp()
  {
    $this->japaneseHoliday = new JapaneseHoliday();
  }

  public function testFixedHoliday()
  {
    $this->assertTrue($this->japaneseHoliday->isHoliday('2012-01-01'));
    $this->assertEquals($this->japaneseHoliday->getHolidayName('2012-01-01'), '元旦');
  }

  public function testSpringDay()
  {
    $this->assertTrue($this->japaneseHoliday->isHoliday('2012-03-20'));
    $this->assertEquals($this->japaneseHoliday->getHolidayName('2012-03-20'), '春分の日');
  }

  public function testAutumnDay()
  {
    $this->assertTrue($this->japaneseHoliday->isHoliday('2012-09-22'));
    $this->assertEquals($this->japaneseHoliday->getHolidayName('2012-09-22'), '秋分の日');
  }

  public function testHappyMonday()
  {
    $this->assertTrue($this->japaneseHoliday->isHoliday('2012-09-17'));
    $this->assertEquals($this->japaneseHoliday->getHolidayName('2012-09-17'), '敬老の日');
  }

  public function testSubstitutionalHoliday()
  {
    $this->assertTrue($this->japaneseHoliday->isHoliday('2012-04-30'));
    $this->assertEquals($this->japaneseHoliday->getHolidayName('2012-04-30'), '振替休日');
  }
  
  public function testHolidaysForYear()
  {
    $holidays = $this->japaneseHoliday->getHolidaysForYear(2012);
    $this->assertTrue(isset($holidays['2012-01-01']));
    $this->assertTrue(isset($holidays['2012-03-20']));
    $this->assertTrue(isset($holidays['2012-09-17']));
    $this->assertTrue(isset($holidays['2012-09-22']));
    $this->assertTrue(isset($holidays['2012-04-30']));
  }
}
