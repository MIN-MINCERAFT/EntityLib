<?php

declare(strict_types=1);

namespace MIN\EntityLib;

use Melody\Npc\Entity\NpcEntities;
use Melody\Npc\Entity\NpcTrait;
use pocketmine\entity\Attribute;
use pocketmine\entity\EntitySizeInfo;
use pocketmine\entity\Living;
use pocketmine\entity\Location;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\network\mcpe\protocol\AddActorPacket;
use pocketmine\network\mcpe\protocol\types\entity\Attribute as NetworkAttribute;
use pocketmine\player\Player;
use function array_map;

class LibEntity extends Living {
    use LibEntityTrait;

    public string $entity_type;

    public function __construct(Location $location, CompoundTag $nbt)
    {
        $this->entity_type = $nbt->getString('ENTITY_TYPE');
        parent::__construct($location, $nbt);
        $this->initLibEntity($nbt);
    }

    protected function sendSpawnPacket(Player $player) : void
    {
        $player->getNetworkSession()->sendDataPacket(AddActorPacket::create
        (
            $this->getId(),
            $this->getId(),
            LibEntities::$entities[$this->entity_type][LibEntities::NETWORK_ID],
            $this->location->asVector3(),
            $this->getMotion(),
            $this->location->pitch,
            $this->location->yaw,
            $this->location->yaw,
            array_map(static function(Attribute $attr) : NetworkAttribute
            {
                return new NetworkAttribute($attr->getId(),$attr->getMinValue(),$attr->getMaxValue(),$attr->getValue(),$attr->getDefaultValue());
            },$this->attributeMap->getAll()),
            $this->getAllNetworkData(),
            []
        ));
    }

    protected function getInitialSizeInfo() : EntitySizeInfo
    {
        return new EntitySizeInfo(LibEntities::$entities[$this->entity_type][LibEntities::HEIGHT],NpcEntities::$entities[$this->entity_type][LibEntities::WIDTH]);
    }

    public static function getNetworkTypeId(): string
    {
        return 'LibEntity';
    }

    public function saveNBT() : CompoundTag
    {
        return $this->saveDatas(parent::saveNBT());
    }
}