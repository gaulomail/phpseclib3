<?php

/**
 * @author    Andreas Fischer <bantu@phpbb.com>
 * @copyright 2013 Andreas Fischer
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace Gaulomail\phpseclib3\Tests\Unit\Math\BigInteger;

use Gaulomail\phpseclib3\Math\BigInteger\Engines\BCMath;

class BCMathTest extends TestCase
{
    public static function setUpBeforeClass()
    {
        if (!BCMath::isValidEngine()) {
            self::markTestSkipped('BCMath extension is not available.');
        }
        BCMath::setModExpEngine('DefaultEngine');
    }

    public function getInstance($x = 0, $base = 10)
    {
        return new BCMath($x, $base);
    }

    public static function getStaticClass()
    {
        return '\Gaulomail\phpseclib3\Math\BigInteger\Engines\BCMath';
    }
}
