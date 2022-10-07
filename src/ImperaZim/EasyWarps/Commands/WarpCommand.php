<?php

namespace ImperaZim\EasyWarps\Commands;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\command\Command;
use ImperaZim\EasyWarps\Loader;
use pocketmine\plugin\PluginOwned;
use pocketmine\command\CommandSender;
use ImperaZim\EasyWarps\Functions\WarpCreate;

class WarpCommand extends Command implements PluginOwned {

 public function __construct() {
  parent::__construct("warp", "§7Warp command!", null, []);
		$this->setPermission("warp.command"); 
 }
 
 public function execute(CommandSender $player, string $commandLabel, array $args) : bool {
  $plugin = $this->getOwningPlugin();
  if (isset($args[0])) {
   switch ($args[0]) {
    case 'create': case 'criar':
     if ($player->hasPermission("warp.create")) {
      if (!isset($args[1])) {
       return true;
      }
      WarpCreate::execute($player, $name, $permission);
     }else{
      $player->sendMessage("§l§cWARP§r Você não tem permissão para criar uma warp!");
     }
     break;
   }
  }else{
   $player->sendMessage("§l§cWARP§r Argumento invalido! Use /warp (criar, deletar)!");
  }
 }
 
 public function getOwningPlugin(): Loader {
		return Loader::getInstance();
	}  
 
}