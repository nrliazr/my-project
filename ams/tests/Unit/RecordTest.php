<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Record;
use Carbon\Carbon;

class RecordTest extends TestCase
{
    /**
     * @test
     */
    public function testIsWeekend()
    {
        // Set the current date to a weekend day (Saturday)
        Carbon::setTestNow(Carbon::create(2022, 1, 1, 0, 0, 0)); // January 1, 2022 is a Saturday

        $this->assertTrue(Record::isWeekend());

        // Set the current date to a weekday (Monday)
        Carbon::setTestNow(Carbon::create(2022, 1, 3, 0, 0, 0)); // January 3, 2022 is a Monday

        $this->assertFalse(Record::isWeekend());
    }
}

