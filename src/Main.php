<?php

declare(strict_types=1);

namespace Kefir\RustLight;

use pocketmine\plugin\PluginBase;
use pocketmine\command\{Command, CommandSender};
use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\inventory\Inventory;

use Frago9876543210\EasyForms\elements\Button;
use Frago9876543210\EasyForms\forms\MenuForm;

final class Main extends PluginBase
{
	function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool
	{
		if(!$sender instanceof Player) { $sender->sendMessage("Испольуйте только в игре"); return true; }
		if(count($args) !== 0) { $sender->sendMessage("Испольуйте: /cr"); return true; }
		$sender->sendForm(new MenuForm("Крафт")
						[
							new Button("План постройки"),
							new Button("Киянка"),
							new Button("Деревянная дверь"),
							new Button("Металлическая дверь"),
							new Button("Бронированная дверь"),
							new Button("Дверной замок"),
							new Button("Кодовый замок"),
							new Button("Деревянное копье"),
							new Button("Каменное копье"),
							new Button("Каменный топор"),
							new Button("Каменная кирка"),
							new Button("Металлический топор"),
							new Button("Металлическая кирка"),
							new Button("Самодельный топор"),
							new Button("Самодельный ледоруб"),
						],
						function(Player $sender, Button $button) : void
						{
							if($button-> getValue() === 0)
							{
								$sender->getInventory()->addItem(Item::get(my:building_plan));
							}
							if($button-> getValue() === 1)
							{
								$sender->getInventory()->addItem(Item::get(my:kuyanka));
							}
		return true;	}}};			
	}
}
?>
