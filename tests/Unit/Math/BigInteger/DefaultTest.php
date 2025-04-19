<?php

/**
 * @author    Andreas Fischer <bantu@phpbb.com>
 * @copyright 2013 Andreas Fischer
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace Gaulomail\phpseclib3\Tests\Unit\Math\BigInteger;

use Gaulomail\phpseclib3\Math\BigInteger;

class DefaultTest extends TestCase
{
    public function getInstance($x = 0, $base = 10)
    {
        return new BigInteger($x, $base);
    }

    public static function getStaticClass()
    {
        return '\Gaulomail\phpseclib3\Math\BigInteger';
    }
}
