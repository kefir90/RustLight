<?php

declare(strict_types=1);

namespace Kefir\RustLight;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerMoveEvent;

use pocketmine\Player;

class FirstPlugin extends PluginBase implements Listener {
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
    $commandName = $command->getName();
    $nickName = $sender->getName();
    if ($commandName === "craft") {
        $sender->sendMessage("Крафт");
        $this->openCustomMenu($sender);
        return true;
    }
    return false;
}
    public function onEnable(): void {
        $this->getserver()->getLogger()->info("§cRustLightPlugin is starting");
        $this->getserver()->getLogger()->info("§cAvoid ку кста");
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
        $form = new SimpleForm(function (Player $player, ?int $data) {
            if ($data === null) return;
            // Обработка выбора из меню
            switch ($data) {
                case 0:
                    // первая
                    break;
                case 1:
                    // вторая
                    break;
                // и так далее
            }
        });
        $form->setTitle("Крафт");
        $form->setContent("Выберите предмет");
        $form->addButton("Киянка");
        $form->addButton("План постройки");
        $form->addButton("Каменный топор");
        $form->addButton("Каменная кирка");
        $form->addButton("Камень");
        $form->addButton("Верстак первого уровня");
        $form->addButton("Деревянное копье");
        $form->addButton("Каменное копье");
        $form->addButton("Печь");
        $form->addButton("Замок");
        $form->addButton("Деревянная дверь");
        $form->addButton("Кодовый замок");
        // тута крч больше кнопок
        $form->sendToPlayer($player);
    }
}
