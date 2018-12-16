<?php


namespace pmmpplugins\pluginmanager\api;

use pocketmine\plugin\PluginManager;

/**
 * Author: pmmp-plugins
 * Project: PluginManager
 * File: API.php
 * Date: 16.12.18
 * IDE: PhpStorm
 */
class API
{
    public static function enable(PluginManager $pluginManager, string $requestedPlugin): bool
    {
        $plugin = $pluginManager->getPlugin($requestedPlugin);

        if ($plugin !== null) {
            $pluginManager->enablePlugin($plugin);
            return true;
        } else {
            return false;
        }
    }

    public static function disable(PluginManager $pluginManager, string $requestedPlugin): bool
    {
        $plugin = $pluginManager->getPlugin($requestedPlugin);

        if ($plugin !== null) {
            $pluginManager->disablePlugin($plugin);
            return true;
        } else {
            return false;
        }
    }
}