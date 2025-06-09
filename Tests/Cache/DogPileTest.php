<?php

namespace Lsw\MemcacheBundle\Tests\Cache;

use Lsw\MemcacheBundle\Cache\AntiDogPileMemcache;


//require_once "../../Cache/LoggingMemcacheInterface.php";
//require_once "../../Cache/MemcacheInterface.php";
//require_once "../../Cache/LoggingMemcache.php";
//require_once "../../Cache/AntiDogPileMemcache.php";

/**
 * Class DogPileTest
 *
 * This class tests the functionality of the AntiDogPileMemcache class,
 * specifically its ability to handle the "dog-pile" effect in caching.
 * The test simulates multiple threads accessing and updating a cache key
 * to ensure proper behavior under concurrent conditions.
 */
class DogPileTest
{
    public function testDogPile()
    {
        for ($t = 1; $t < 3; $t++) {
            $pid = pcntl_fork();
            if ($pid == -1) {
                die('could not fork');
            }
            if ($pid == 0) {
                break;
            }
        }

        $c = 10;
        $m = new AntiDogPileMemcache(false, []);
        $m->addServer('localhost', 11212, 0);
        if ($t == 1) {
            echo "THREAD | SECOND | STATUS\n";
        }
        for ($i = 0; $i < $c; $i++) {
            sleep(1);
            if (false === ($v = $m->getAdp('key'))) {
                echo sprintf("%6s | %6s | %s\n", $t, $i, "STALE!");
                sleep(1);
                $v = time();
                $m->setAdp('key', $v, 2);
                echo sprintf("%6s | %6s | %s\n", $t, $i, "SET $v");
            } else {
                echo sprintf("%6s | %6s | %s\n", $t, $i, $v);
            }
        }
        sleep(3);
    }
}

$t = new DogPileTest();
$t->testDogPile();
