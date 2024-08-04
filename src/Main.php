<?php

declare(strict_types=1);

namespace pixelwhiz\lightningtp;

use onebone\economyapi\EconomyAPI;
use pocketmine\entity\Entity;
use pocketmine\event\entity\EntityTeleportEvent;
use pocketmine\item\VanillaItems;
use pocketmine\network\mcpe\NetworkBroadcastUtils;
use pocketmine\network\mcpe\protocol\AddActorPacket;
use pocketmine\network\mcpe\protocol\PlaySoundPacket;
use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\network\mcpe\protocol\types\entity\PropertySyncData;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\Server;
use pocketmine\world\particle\BlockBreakParticle;

class Main extends PluginBase implements Listener{

    public function onEnable() : void
    {
        Server::getInstance()->getPluginManager()->registerEvents($this, $this);
    }

    public function onEntityTeleport(EntityTeleportEvent $event) {
        $entity = $event->getEntity();
        if (!$entity instanceof Player) return false;
        if (!$entity->hasPermission("lightningtp.tp")) return false;
        $this->sendLightningToPlayer($entity);
    }

    public function sendLightningToPlayer(Player $entity) : void{
        $pos = $entity->getPosition();
        $packet = new AddActorPacket();
        $packet->actorUniqueId = Entity::nextRuntimeId();
        $packet->actorRuntimeId = 1;
        $packet->position = $entity->getPosition()->asVector3();
        $packet->type = EntityIds::LIGHTNING_BOLT;
        $packet->yaw = $entity->getLocation()->getYaw();
        $packet->syncedProperties = new PropertySyncData([], []);
        $sound = PlaySoundPacket::create("ambient.weather.thunder", $pos->getX(), $pos->getY(), $pos->getZ(), 100, 1);
        NetworkBroadcastUtils::broadcastPackets($entity->getWorld()->getPlayers(), [$packet, $sound]);

        $block = $entity->getWorld()->getBlock($entity->getPosition()->floor()->down());
        $particle = new BlockBreakParticle($block);
        $entity->getWorld()->addParticle($pos, $particle, $entity->getWorld()->getPlayers());
    }

}
