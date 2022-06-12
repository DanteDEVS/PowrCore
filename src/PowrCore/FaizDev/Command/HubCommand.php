<?php

declare(strict_types=1);

namespace PowrCore\FaizDev\Command;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\player\GameMode;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\plugin\PluginOwned;

use PowrCore\FaizDev\PowrCore;

class HubCommand extends Command implements PluginOwned {

    private $plugin;

    public function __construct(PowrCore $plugin){
        $this->plugin = $plugin; 

        parent::__construct("hub", 'Teleport you to the server spawn!', null, ["spawn", "lobby"]);
        $this->setAliases(["spawn", "lobby"]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void {
        if ($sender instanceof Player) {
            $sender->teleport(Server::getInstance()->getWorldManager()->getDefaultWorld()->getSafeSpawn());
            $sender->getInventory()->clearAll();
            $sender->getArmorInventory()->clearAll();
            $sender->getCraftingGrid()->clearAll();
            $sender->getEffects()->clear();
            $sender->setHealth(20);
            $sender->getHungerManager()->setFood(20);
            $sender->getGamemode(GameMode::ADVENTURE());
            $this->onJoin($sender);
            } else {
                $sender->sendMessage("Use this command in-game");
            }
        }

    public function getOwningPlugin(): PowrCore{
        return $this->plugin;
    }
}
