<?php
namespace DietcubeWhoops;

use Whoops\Handler\Handler;

/**
 * Whoops-catchable Dietcube dispatcher
 *
 * @copyright 2016 USAMI Kenta
 * @copyright 2015 Mercari, Inc.
 * @license   https://github.com/zonuexe/dietcube-whoops/master/LICENSE MIT
 */
trait Whoopsable
{
    public static function invoke($app_class, $app_root_dir, $env, Handler $handler = null)
    {
        $app = new $app_class($app_root_dir, $env);
        $dispatcher = new static($app);
        $dispatcher->boot();

        if ($app->isDebug()) {
            if (is_null($handler)) {
                $handler = new \Whoops\Handler\PrettyPageHandler;
            }
            $whoops = new \Whoops\Run;
            $whoops->pushHandler($handler);
            $whoops->register();
        }

        try {
            $response = $dispatcher->handleRequest();
        } catch (\Exception $e) {
            if ($app->isDebug()) {
                throw $e;
            }
            $response = $dispatcher->handleError($e);
        }
    }
}
