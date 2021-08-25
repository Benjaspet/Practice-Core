<?php

declare(strict_types=1);

namespace Eerie\listeners;

use Eerie\Core;
use pocketmine\event\Listener;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\network\mcpe\protocol\InventoryTransactionPacket;
use pocketmine\network\mcpe\protocol\LevelSoundEventPacket;
use pocketmine\network\mcpe\protocol\types\inventory\UseItemOnEntityTransactionData;

class PlayerListener implements Listener {

    private $core;

    public function __construct(Core $core) {
        $this->core = $core;
    }

    /*
     * @comment In older version of PocketMine, you could get the transaction type of each packet dynamically.
     * @comment Now, the most efficient way to add CPS is to do so by LevelSoundPackets.
     */

    public function onPacketReceive(DataPacketReceiveEvent $event) {
        $packet = $event->getPacket();
        $player = $event->getPlayer();
        if ($packet instanceof LevelSoundEventPacket) {
            if ($packet->sound === LevelSoundEventPacket::SOUND_ATTACK_NODAMAGE) {
                $this->core->getManager()->getRetriever()->getClickUtil()->addToClicksArray($player);
                $this->core->getManager()->getRetriever()->getClickUtil()->addClick($player);
            }
        } else if ($packet instanceof InventoryTransactionPacket) {
            if ($packet->trData instanceof UseItemOnEntityTransactionData) {
                $this->core->getManager()->getRetriever()->getClickUtil()->addToClicksArray($player);
                $this->core->getManager()->getRetriever()->getClickUtil()->addClick($player);
            }
        }

        /*
         * @comment Older method to handle clicks.
         */

        /*if ($packet::NETWORK_ID===InventoryTransactionPacket::NETWORK_ID and $packet->transactionType===InventoryTransactionPacket::TYPE_USE_ITEM_ON_ENTITY){
            $this->plugin->getClickUtil()->addToArray($player);
            $this->plugin->getClickUtil()->addClick($player);
        }
        if ($packet::NETWORK_ID === LevelSoundEventPacket::NETWORK_ID and $packet->sound === LevelSoundEventPacket::SOUND_ATTACK_NODAMAGE) {
            $this->plugin->getClickUtil()->addToArray($player);
            $this->plugin->getClickUtil()->addClick($player);
        }*/

    }

}
