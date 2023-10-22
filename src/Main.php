<?php

declare(strict_types=1);

namespace Kefir\RustLight;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\form\ModalForm;

class FirstPlugin extends PluginBase implements Listener {

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        $commandName = $command->getName();
        $nickName = $sender->getName();
        if (strtolower($commandName) === "craft") {
            $sender->sendMessage("Крафт");
            $this->openCustomMenu($sender);
            return true;
        }
        return false;
    }

    public function onEnable(): void {
        $this->getServer()->getLogger()->info("§cRustLightPlugin is starting");
        $this->getServer()->getLogger()->info("§cAvoid ку кста");
    }

    public function onDisable(): void {
        $this->getServer()->getLogger()->info("§cRustLightPlugin is shutdown");
    }

    public function onJoin(PlayerJoinEvent $event) {
        $player = $event->getPlayer();
        $nickName = $player->getName();
        $event->setJoinMessage("§aИгрок §b$nickName §aзашел на сервер!");
        $player->sendMessage("§eТы зашел на сервер! §b$nickName");
    }

    private function openCustomMenu(Player $player) {
        $form = new ModalForm(function (Player $player, ?bool $choice) {
            if ($choice === null) return;
            if ($choice) {
                // Выбрано "Да"
                $player->sendMessage("Вы выбрали 'Да'");
                // Добавьте здесь действия для выбора 'Да'
            } else {
                // Выбрано "Нет"
                $player->sendMessage("Вы выбрали 'Нет'");
                // Добавьте здесь действия для выбора 'Нет'
            }
        });
        $form->setTitle("Крафт");
        $form->setContent("Вы уверены, что хотите начать крафт?");
        $form->setButton1("Да");
        $form->setButton2("Нет");
        $form->sendToPlayer($player);
    }
}
