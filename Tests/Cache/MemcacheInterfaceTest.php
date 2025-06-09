<?php

namespace Lsw\MemcacheBundle\Tests\Cache;

use PHPUnit\Framework\TestCase;

/**
 * Testing the MemcacheInterface Switch.
 *
 * @author Julius Beckmann <github@h4cc.de>
 */
class MemcacheInterfaceTest extends TestCase
{
    public function testInterfaceWorks()
    {
        $class = new \ReflectionClass('\Lsw\MemcacheBundle\Cache\MemcacheInterface');

        $methods = array_map(
            function (\ReflectionMethod $method) {
                return $method->getName();
            },
            $class->getMethods()
        );

        foreach ($this->getDefaultMethods() as $method) {
            $this->assertContains($method, $methods);
        }
    }

    private function getDefaultMethods(): array
    {
        return [
            'setFailureCallback',
            'getServerStatus',
            'getVersion',
            'add',
            'set',
            'replace',
            'cas',
            'prepend',
            'get',
            'getStats',
            'getExtendedStats',
            'setCompressThreshold',
            'delete',
            'increment',
            'decrement',
            'close',
            'flush',
            'addServer',
            'connect',
            'findServer',
        ];
    }
}
