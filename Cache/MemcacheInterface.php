<?php

namespace Lsw\MemcacheBundle\Cache;

interface MemcacheInterface
{
    public function add(array|string $key, mixed $value = null, int $flags = 0, int $exptime = 0, int $cas = 0): bool;
    public function addServer($host, $tcp_port = 11211, $udp_port = 0, $persistent = true, $weight = 1, $timeout = 1, $retry_interval = 15, $status = true): bool;
    public function cas(array|string $key, mixed $value = null, int $flags = 0, int $exptime = 0, int $cas = 0): bool;
    public function close(): bool;
    public function connect($host, $tcpPort = 11211, $udpPort = 0, $persistent = true, $weight = 1, $timeout = 1, $retryInterval = 15);
    public function decrement(array|string $key, int $value = 1, int $defval = 0, int $exptime = 0): array|int|bool;
    public function delete(array|string $key, int $exptime = 0): array|bool;
    public function findServer($key): string|bool;
    public function flush($delay = 0): bool;
    public function get(array|string $key, mixed &$flags = null, mixed &$cas = null): mixed;
    public function getExtendedStats(string $type = '', int $slabid = 0, int $limit = 100): array|bool;
    public function getServerStatus($host, $port = 11211): int|bool;
    public function getStats(string $type = '', int $slabid = 0, int $limit = 100): array|bool;
    public function getVersion(): string|bool;
    public function increment(array|string $key, int $value = 1, int $defval = 0, int $exptime = 0): array|int|bool;
    public function prepend(array|string $key, mixed $value = null, int $flags = 0, int $exptime = 0, int $cas = 0): bool;
    public function replace(array|string $key, mixed $value = null, int $flags = 0, int $exptime = 0, int $cas = 0): bool;
    public function set(array|string $key, mixed $value = null, int $flags = 0, int $exptime = 0, int $cas = 0): bool;
    public function setCompressThreshold(int $threshold, float $min_savings = 0.2): bool;
    public function setFailureCallback($failureCallback): bool;
}