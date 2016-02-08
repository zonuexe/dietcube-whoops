<?php
namespace DietcubeWhoops;

/**
 * Whoops-catchable Dietcube dispatcher
 *
 * @copyright 2016 USAMI Kenta
 * @copyright 2015 Mercari, Inc.
 * @license   https://github.com/zonuexe/dietcube-whoops/master/LICENSE MIT
 */
class Dispatcher extends \Dietcube\Dispatcher
{
    use Whoopsable;
}
