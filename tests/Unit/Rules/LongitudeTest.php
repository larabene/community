<?php

namespace Tests\Unit\Rules;

use App\Rules\Longitude;
use PHPUnit\Framework\TestCase;

class LongitudeTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param string $longitude
     * @param bool $expected
     * @test
     */
    public function it_can_check_if_a_longitude_is_valid(string $longitude, bool $expected)
    {
        $result = Longitude::valid($longitude);

        $this->assertEquals($expected, $result);
    }

    public function dataProvider()
    {
        return [
            ['199.123456', false],
            ['180.000000', true],
            ['179.123456', true],
            ['0.000000', true],
            ['-179.123456', true],
            ['-180.000000', true],
            ['-199.123456', false],
        ];
    }
}
