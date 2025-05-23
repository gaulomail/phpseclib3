<?php

/**
 * @author    Andreas Fischer <bantu@phpbb.com>
 * @copyright 2014 Andreas Fischer
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace Gaulomail\phpseclib3\Tests\Unit\Crypt;

use Gaulomail\phpseclib3\Crypt\Random;
use Gaulomail\phpseclib3\Tests\PhpseclibTestCase;

class RandomTest extends PhpseclibTestCase
{
    public static function stringLengthData()
    {
        return array_map(function ($x) {
            return [$x];
        }, [
            1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 13, 17, 19, 20, 23, 29, 31, 37,
            41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97, 111, 128, 1000,
            1024, 10000, 12345, 100000, 123456
        ]);
    }

    /** @dataProvider stringLengthData */
    public function testStringLength($length)
    {
        $this->assertSame(
            $length,
            strlen(Random::string($length)),
            'Failed asserting that a string of expected length was generated.'
        );
    }

    /**
     * Takes a set of random values of length 128 bits and asserts all taken
     * values are unique.
     */
    public function testStringUniqueness()
    {
        $values = [];
        for ($i = 0; $i < 10000; ++$i) {
            $rand = Random::string(16);
            $this->assertSame(16, strlen($rand));
            $this->assertArrayNotHasKey(
                $rand,
                $values,
                'Failed asserting that generated value does not exist in set.'
            );
            $values[$rand] = true;
        }
    }
}
