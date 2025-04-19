<?php

/**
 * GMP Modular Exponentiation Engine
 *
 * PHP version 5 and 7
 *
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2017 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link      http://pear.php.net/package/Math_BigInteger
 */

namespace Gaulomail\phpseclib3\Math\BigInteger\Engines\GMP;

use Gaulomail\phpseclib3\Math\BigInteger\Engines\GMP;

/**
 * GMP Modular Exponentiation Engine
 *
 * @author  Jim Wigginton <terrafrost@php.net>
 */
class DefaultEngine extends GMP
{
    /**
     * Performs modular exponentiation.
     *
     * @param GMP $e
     * @param GMP $n
     * @return GMP
     */
    public function powModHelper(GMP $e, GMP $n)
    {
        $temp = new self();
        $temp->value = gmp_powm($this->value, $e->value, $n->value);
        
        return $this->normalize($temp);
    }
}
