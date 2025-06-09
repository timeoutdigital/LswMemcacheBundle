<?php

namespace Lsw\MemcacheBundle\Cache;

class LoggingMemcache extends \MemcachePool implements MemcacheInterface, LoggingMemcacheInterface
{
    public function __construct($logging)
    {
        $this->calls = [];
        $this->logging = $logging;
    }

    private $calls;
    private $logging;

    public function getLoggedCalls()
    {
        return $this->calls;
    }

    private function logCall($start, $result)
    {
        $time = microtime(true) - $start;
        $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        return $result;
    }

    public function setFailureCallback($failureCallback): bool
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'setFailureCallback';
            $arguments = [$failureCallback];
        }
        list($_failureCallback) = [$failureCallback];
        $result = parent::setFailureCallback($_failureCallback);
        list($failureCallback) = [$_failureCallback];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }
        return $result;
    }

    public function getServerStatus($host, $port = 11211): int|bool
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'getServerStatus';
            $arguments = [$host, $port];
        }
        list($_host, $_port) = [$host, $port];
        $result = parent::getServerStatus($_host, $_port);
        list($host, $port) = [$_host, $_port];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }
        return $result;
    }

    public function getVersion(): string|bool
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'getVersion';
            $arguments = [];
        }
        $result = parent::getVersion();

        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }
        return $result;
    }

   public function add(array|string $key, mixed $value = null, int $flags = 0, int $exptime = 0, int $cas = 0): bool

    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'add';
            $arguments = [$key, $value, $flags, $exptime];
        }
        list($_key, $_var, $_flag, $_exptime) = [$key, $value, $flags, $exptime];
        $result = parent::add($_key, $_var, $_flag, $_exptime);
        list($key, $value, $flags, $exptime) = [$_key, $_var, $_flag, $_exptime];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }
        return $result;
    }

    public function set(array|string $key, mixed $value = null, int $flags = 0, int $exptime = 0, int $cas = 0): bool
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'set';
            $arguments = [$key, $value, $flags, $exptime];
        }
        list($_key, $_var, $_flag, $_exptime) = [$key, $value, $flags, $exptime];
        $result = parent::set($_key, $_var, $_flag, $_exptime);
        list($key, $value, $flags, $exptime) = [$_key, $_var, $_flag, $_exptime];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }
        return $result;
    }

    public function replace(array|string $key, mixed $value = null, int $flags = 0, int $exptime = 0, int $cas = 0): bool
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'replace';
            $arguments = [$key, $value, $flags, $exptime];
        }
        list($_key, $_var, $_flag, $_exptime) = [$key, $value, $flags, $exptime];
        $result = parent::replace($_key, $_var, $_flag, $_exptime);
        list($key, $value, $flags, $exptime) = [$_key, $_var, $_flag, $_exptime];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }
        return $result;
    }

    public function cas(array|string $key, mixed $value = null, int $flags = 0, int $exptime = 0, int $cas = 0): bool {

        if ($this->logging) {
            $start = microtime(true);
            $name = 'cas';
            $arguments = [$key, $value, $flags, $exptime, $cas];
        }
        list($_key, $_var, $_flag, $_exptime, $_cas) = [$key, $value, $flags, $exptime, $cas];
        $result = parent::cas($_key, $_var, $_flag, $_exptime, $_cas);
        list($key, $value, $flags, $exptime, $cas) = [$_key, $_var, $_flag, $_exptime, $_cas];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }
        return $result;
    }

    public function prepend(array|string $key, mixed $value = null, int $flags = 0, int $exptime = 0, int $cas = 0): bool
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'prepend';
            $arguments = [$key, $value, $flags, $exptime];
        }
        list($_key, $_var, $_flag, $_exptime) = [$key, $value, $flags, $exptime];
        $result = parent::prepend($_key, $_var, $_flag, $_exptime);
        list($key, $value, $flags, $exptime) = [$_key, $_var, $_flag, $_exptime];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }
        return $result;
    }

    public function get(array|string $key, mixed &$flags = null, mixed &$cas = null): mixed
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'get';
            $arguments = [$key, $flags, $cas];
        }
        list($_key, $_flags, $_cas) = [$key, $flags, $cas];
        $result = parent::get($_key, $_flags, $_cas);
        list($key, $flags, $cas) = [$_key, $_flags, $_cas];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }
        return $result;
    }

    public function getstats(string $type = '', int $slabid = 0, int $limit = 100): array|bool
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'getStats';
            $arguments = [$type, $slabid, $limit];
        }
        list($_type, $_slabid, $_limit) = [$type, $slabid, $limit];
        if ($_type == '') {
            $result = parent::getStats();
        } else {
            $result = parent::getStats($_type, $_slabid, $_limit);
        }
        list($type, $slabid, $limit) = [$_type, $_slabid, $_limit];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }
        return $result;
    }

    public function getextendedstats(string $type = '', int $slabid = 0, int $limit = 100): array|bool
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'getExtendedStats';
            $arguments = [$type, $slabid, $limit];
        }
        list($_type, $_slabid, $_limit) = [$type, $slabid, $limit];
        if ($_type == '') {
            $result = parent::getExtendedStats();
        } else {
            $result = parent::getExtendedStats($_type, $_slabid, $_limit);
        }
        list($type, $slabid, $limit) = [$_type, $_slabid, $_limit];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }
        return $result;
    }

    public function setcompressthreshold(int $threshold, float $min_savings = 0.2): bool
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'setCompressThreshold';
            $arguments = [$threshold, $min_savings];
        }
        list($_threshold, $_minSavings) = [$threshold, $min_savings];
        $result = parent::setCompressThreshold($_threshold, $_minSavings);
        list($threshold, $min_savings) = [$_threshold, $_minSavings];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }
        return $result;
    }

    public function delete(array|string $key, int $exptime = 0): array|bool
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'delete';
            $arguments = [$key, $exptime];
        }
        list($_key, $_exptime) = [$key, $exptime];
        $result = parent::delete($_key, $_exptime);
        list($key, $exptime) = [$_key, $_exptime];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }
        return $result;
    }

    public function increment(array|string $key, int $value = 1, int $defval = 0, int $exptime = 0): array|int|bool
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'increment';
            $arguments = [$key, $value, $defval, $exptime];
        }
        list($_key, $_value, $_defval, $_exptime) = [$key, $value, $defval, $exptime];
        $result = parent::increment($_key, $_value, $_defval, $_exptime);
        list($key, $value, $defval, $exptime) = [$_key, $_value, $_defval, $_exptime];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }
        return $result;
    }

    public function decrement(array|string $key, int $value = 1, int $defval = 0, int $exptime = 0): array|int|bool
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'decrement';
            $arguments = [$key, $value, $defval, $exptime];
        }
        list($_key, $_value, $_defval, $_exptime) = [$key, $value, $defval, $exptime];
        $result = parent::decrement($_key, $_value, $_defval, $_exptime);
        list($key, $value, $defval, $exptime) = [$_key, $_value, $_defval, $_exptime];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }
        return $result;
    }

    public function close(): bool
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'close';
            $arguments = [];
        }
        $result = parent::close();

        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }
        return $result;
    }

    public function flush($delay = 0): bool
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'flush';
            $arguments = [$delay];
        }
        list($_delay) = [$delay];
        $result = parent::flush($_delay);
        list($delay) = [$_delay];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }
        return $result;
    }


    public function addServer($host, $tcp_port = 11211, $udp_port = 0, $persistent = true, $weight = 1, $timeout = 1, $retry_interval = 15, $status = true): bool
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'addServer';
            $arguments = [$host, $tcp_port, $udp_port, $persistent, $weight, $timeout, $retry_interval, $status];
        }

        list($_host, $_tcpPort, $_udpPort, $_persistent, $_weight, $_timeout, $_retryInterval, $_status) = [$host, $tcp_port, $udp_port, $persistent, $weight, $timeout, $retry_interval, $status];

        $result = parent::addServer($_host, $_tcpPort, $_udpPort, $_persistent, $_weight, $_timeout, $_retryInterval, $_status);

        list($host, $tcp_port, $udp_port, $persistent, $weight, $timeout, $retry_interval, $status) = [$_host, $_tcpPort, $_udpPort, $_persistent, $_weight, $_timeout, $_retryInterval, $_status];

        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }

        return $result;
    }

    public function connect($host, $tcpPort = 11211, $udpPort = 0, $persistent = true, $weight = 1, $timeout = 1, $retryInterval = 15)
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'connect';
            $arguments = [$host, $tcpPort, $udpPort, $persistent, $weight, $timeout, $retryInterval];
        }
        list($_host, $_tcpPort, $_udpPort, $_persistent, $_weight, $_timeout, $_retryInterval) = [$host, $tcpPort, $udpPort, $persistent, $weight, $timeout, $retryInterval];
        $result = parent::connect($_host, $_tcpPort, $_udpPort, $_persistent, $_weight, $_timeout, $_retryInterval);
        list($host, $tcpPort, $udpPort, $persistent, $weight, $timeout, $retryInterval) = [$_host, $_tcpPort, $_udpPort, $_persistent, $_weight, $_timeout, $_retryInterval];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }
        return $result;
    }

    public function findServer($key): string|bool
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'findServer';
            $arguments = [$key];
        }

        list($_key) = [$key];

        $result = parent::findServer($_key);

        list($key) = [$_key];

        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }

        return $result;
    }
}
