<?php

/**
 * @author    Andreas Fischer <bantu@phpbb.com>
 * @copyright 2013 Andreas Fischer
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace Gaulomail\phpseclib3\Tests\Unit\Math\BigInteger;

use Gaulomail\phpseclib3\Exception\BadConfigurationException;
use Gaulomail\phpseclib3\Math\BigInteger\Engines\PHP64;

class PHP64OpenSSLTest extends TestCase
{
    public static function setUpBeforeClass()
    {
        if (!PHP64::isValidEngine()) {
            self::markTestSkipped('64-bit integers are not available.');
        }

        try {
            PHP64::setModExpEngine('OpenSSL');
        } catch (BadConfigurationException $e) {
            self::markTestSkipped('openssl_public_encrypt() function is not available.');
        }
    }

    public function getInstance($x = 0, $base = 10)
    {
        return new PHP64($x, $base);
    }

    public function testInternalRepresentation()
    {
        $x = new PHP64('FFFFFFFFFFFFFFFFC90FDA', 16);
        $y = new PHP64("$x");

        $this->assertSame(self::getVar($x, 'value'), self::getVar($y, 'value'));
    }

    public static function getStaticClass()
    {
        return '\Gaulomail\phpseclib3\Math\BigInteger\Engines\PHP64';
    }
}
