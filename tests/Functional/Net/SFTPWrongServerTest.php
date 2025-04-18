<?php

namespace Gaulomail\Phpseclib3\Tests\Functional\Net;

use Gaulomail\Phpseclib3\Exception\UnableToConnectException;
use Gaulomail\Phpseclib3\Net\SFTP;
use PHPUnit\Framework\TestCase;

class SFTPWrongServerTest extends TestCase
{
    public function testLoginToInvalidServer()
    {
        try {
            (new SFTP('dummy-server'))->login('username', 'password');
            static::fail('The connection to the non-existent server must not succeed.');
        } catch (UnableToConnectException $e) {
            // getaddrinfo message seems not to return stable text
            static::assertSame(
                'Cannot connect to dummy-server:22. Error 0. php_network_getaddresses: getaddrinfo',
                substr($e->getMessage(), 0, 81)
            );
        }
    }
}
