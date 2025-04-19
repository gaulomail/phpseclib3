<?php

/**
 * PrivateKey interface
 *
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2009 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link      http://phpseclib.sourceforge.net
 */

namespace Gaulomail\phpseclib3\Crypt\Common;

/**
 * PrivateKey interface
 *
 * @author  Jim Wigginton <terrafrost@php.net>
 */
interface PrivateKey
{
    /**
     * @param string $message
     * @return string
     */
    public function sign($message);
    //public function decrypt($ciphertext);
    /**
     * @return \Gaulomail\phpseclib3\Crypt\Common\PublicKey
     */
    public function getPublicKey();
    /**
     * @param string $type
     * @param array $options
     * @return string
     */
    public function toString($type, array $options = []);

    /**
     * @param string|false $password
     * @return \Gaulomail\phpseclib3\Crypt\Common\PrivateKey
     */
    public function withPassword($password = false);
}
