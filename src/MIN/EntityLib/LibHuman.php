<?php

declare(strict_types=1);

namespace MIN\EntityLib;

use pocketmine\entity\Human;
use pocketmine\entity\Location;
use pocketmine\entity\Skin;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\network\mcpe\protocol\EmotePacket;
use pocketmine\player\Player;

class LibHuman extends Human {
    use LibEntityTrait;

    public string $entity_type = '사람';

    public function __construct(Location $location, Skin $skin, ?CompoundTag $nbt = null)
    {
        $nbt = $nbt ?? CompoundTag::create();
        parent::__construct($location, $skin, $nbt);
        $this->initLibEntity($nbt);
    }

    /**
     * @param Player[] $players
     * @param string $emote_uuid
     * @return void
     */
    final public function createEmote(array $players, string $emote_uuid): void
    {
        $packet = EmotePacket::create($this->getId(),$emote_uuid,EmotePacket::FLAG_SERVER);
        $this->server->broadcastPackets($players,[$packet]);
    }

    public function saveNBT() : CompoundTag
    {
        return $this->saveDatas(parent::saveNBT());
    }
}