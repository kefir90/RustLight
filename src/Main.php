<?php

declare(strict_types=1);

namespace Kefir\RustLight;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerMoveEvent;

class FirstPlugin extends PluginBase implements Listener {
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
    $commandName = $command->getName();
    $nickName = $sender->getName();
    if ($commandName === "craft") {
        $sender->sendMessage("Крафт");
        return true;
    }
    return false;
        $this->getServer()->getCommandMap()->register("craft", new CraftCommand());
}
    public function onDisable() {
        $this->getServer()->getLogger()->info("§cНаш плагин выключился");
    }
    
    public function onJoin(PlayerJoinEvent $event) {
        $player = $event->getPlayer();
        $nickName = $player->getName();
        $event->setJoinMessage("§aИгрок §b$nickName §aзашел на сервер! §6Поприветствуем!");
        $player->sendMessage("§eТы зашел на сервер! §b$nickName");
    }

    public function onMove(PlayerMoveEvent $event) {
        $player = $event->getPlayer();
        $nickName = $player->getName();
        $x = $player->getFloorX();
        $y = $player->getFloorY();
        $z = $player->getFloorZ();
        $player->sendTip("$nickName: x: $x, y: $y, z: $z");
    }
}
