<?php

namespace pmmpplugins\pluginmanager;

use pmmpplugins\pluginmanager\commands\DisableCommand;
use pmmpplugins\pluginmanager\commands\EnableCommand;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

/**
 * Author: pmmp-plugins
 * Project: PluginManager
 * File: PluginManager.php
 * Date: 16.12.18
 * IDE: PhpStorm
 */
class PluginManager extends PluginBase
{
    private $prefix;

    public function onEnable()
    {
        $this->prefix = TextFormat::GRAY . "[" . TextFormat::GREEN . "PluginManager" . TextFormat::GRAY . "] " . TextFormat::RESET;

        $this->loadCommands();

        $this->getLogger()->info("Enabled PluginManager v" . $this->getDescription()->getVersion() . " made by PMMP-Plugins");
    }

    public function onDisable()
    {
        $this->getLogger()->info("Disabled PluginManager v" . $this->getDescription()->getVersion() . " made by PMMP-Plugins");
    }

    private function loadCommands(): void
    {
        $commandMap = $this->getServer()->getCommandMap();

        $commandMap->register("pluginmanager", new EnableCommand($this));
        $commandMap->register("pluginmanager", new DisableCommand($this));
    }

    public function getPrefix(): string
    {
        return $this->prefix;
    }
}