<?php

namespace itzdapakrep/lightningtp;

use pocketmine\Player;
use pocketmine\Server;

use pocketmine\entity\Entity;
use pocketmine\network\mcpe\protocol\AddActorPacket;

use pocketmine\event\Listener;

class EventListener implements Listener {

    public function onJoin(PlayerJoinEvent $event){
        $player = $event->getPlayer();
        $this->addPlayer($player)
    }

    public function addPlayer(Player $player){
        $level = $player->getLevel();

        $lightning = new AddActorPacket();
        $lightning->type = Entity::LIGHTNING_BOLT;
        $lightning->entityRuntimeId = Entity::$entityCount++;
        $lightning->metadata = [];
        $lightning->position = $player->asPosition();
        $lightning->yaw = 0;
        $lightning->pitch = 0;

        $player->getServer()->broadcastPacket($level->getPlayers(), $lightning);
    }

}