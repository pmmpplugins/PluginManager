<?php


namespace pmmpplugins\pluginmanager\commands;

use pmmpplugins\pluginmanager\api\API;
use pmmpplugins\pluginmanager\PluginManager;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\plugin\Plugin;

/**
 * Author: pmmp-plugins
 * Project: PluginManager
 * File: EnableCommand.php
 * Date: 16.12.18
 * IDE: PhpStorm
 */
class EnableCommand extends Command implements PluginIdentifiableCommand
{
    private $pluginManager;
    private $prefix;

    public function __construct(PluginManager $pluginManager)
    {
        $this->pluginManager = $pluginManager;
        $this->prefix = $pluginManager->getPrefix();

        parent::__construct("enable", "Enable a (disabled) plugin.", "/enable <plugin>", []);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): bool
    {
        if ($sender->hasPermission("pluginmanager.enable")) {
            if (isset($args[0])) {
                if (API::enable($this->pluginManager->getServer()->getPluginManager(), $args[0])){
                    $sender->sendMessage($this->prefix . "Enabled plugin '" . $args[0] . "'.");
                } else {
                    $sender->sendMessage($this->prefix . "'" . $args[0] . "' is not a valid plugin.");
                }
            } else {
                $sender->sendMessage($this->prefix . "/enable <plugin>");
            }
            return true;
        } else {
            $sender->sendMessage($this->prefix . "You have no permission to perform this command!");
            return false;
        }
    }

    public function getPlugin(): Plugin
    {
        return $this->pluginManager;
    }
}