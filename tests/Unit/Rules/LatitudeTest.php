<?php

namespace Tests\Unit\Rules;

use App\Rules\Latitude;
use PHPUnit\Framework\TestCase;

class LatitudeTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param string $latitude
     * @param bool $expected
     * @test
     */
    public function it_can_check_if_a_latitude_is_valid(string $latitude, bool $expected)
    {
        $result = Latitude::valid($latitude);

        $this->assertEquals($expected, $result);
    }

    public function dataProvider()
    {
        return [
            ['99.123456', false],
            ['90.000000', true],
            ['89.123456', true],
            ['0.000000', true],
            ['-89.123456', true],
            ['-90.000000', true],
            ['-99.123456', false],
        ];
    }
}
