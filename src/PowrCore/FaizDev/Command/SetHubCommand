<?php

namespace PowrCore\FaizDev\Command;

use CortexPE\Commando\BaseCommand;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class SetHubCommand extends BaseCommand
{

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
}
