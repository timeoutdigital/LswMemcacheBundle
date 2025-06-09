<?php

namespace Lsw\MemcacheBundle\Tests\Cache;

use Lsw\MemcacheBundle\Cache\AntiDogPileMemcache;
use PHPUnit\Framework\TestCase;

/**
 * Testing the AntiDogPileMemcache Class.
 *
 * @author Julius Beckmann <github@h4cc.de>
 */
class AntiDogPileMemcacheTest extends TestCase
{
    public function testConstructAndInterfaces()
    {
        $cache = new AntiDogPileMemcache('foo', []);

        $this->assertInstanceOf('\Lsw\MemcacheBundle\Cache\LoggingMemcache', $cache);
    }
}
