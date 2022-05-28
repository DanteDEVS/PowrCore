<?php

namespace PowrCore\FaizDev\Command;

use pocketmine\plugin\PluginOwned;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class SetHubCommand extends Command implements PluginOwned {

    protected function prepare() : void
    {

    }

    public function onRun(CommandSender $sender, string $aliasUsed, array $args) : void
    {
        if($sender instanceof Player){
            $world = $sender->getWorld();
            $pos = $sender->getPosition();
            $world->setSpawnLocation($pos);
            $sender->sendMessage("New Spawn Position " . $pos);
        }
    }
    public function getOwningPlugin(): PowrCore{
        return $this->plugin;
}
