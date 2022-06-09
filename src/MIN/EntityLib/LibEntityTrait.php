<?php

declare(strict_types=1);

namespace MIN\EntityLib;

use pocketmine\player\Player;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\network\mcpe\protocol\MovePlayerPacket;
use pocketmine\network\mcpe\protocol\MoveActorAbsolutePacket;
use pocketmine\network\mcpe\protocol\types\entity\EntityMetadataFlags;

use function sqrt;
use function atan2;

trait LibEntityTrait
{
    public bool $isBaby = false;

    public function initLibEntity(CompoundTag $nbt) : void
    {
        $this->setNameTagAlwaysVisible((bool) $nbt->getTag('ALWAYS_NAME_TAG')?->getValue() ?? false);
        $this->setScale($nbt->getTag('SCALE')?->getValue() ?? 1.0);
        $this->isBaby = (bool) $nbt->getTag('BABY')?->getValue() ?? false;
        $this->getNetworkProperties()->setGenericFlag(EntityMetadataFlags::BABY,$this->isBaby);
    }

    public function setLibEntityBaby(bool $baby): void
    {
        $this->isBaby = $baby;
        $this->getNetworkProperties()->setGenericFlag(EntityMetadataFlags::BABY,$this->isBaby);
    }

    public function saveDatas(CompoundTag $nbt) : CompoundTag
    {
        if($this instanceof LibEntity) $nbt->setString('ENTITY_TYPE',$this->entity_type);
        $nbt->setFloat('SCALE',$this->getScale());
        $nbt->setByte('ALWAYS_NAME_TAG',(int) $this->isNameTagAlwaysVisible());
        $nbt->setByte('BABY',(int) $this->isBaby);
        return $nbt;
    }

    public function getName() : string
    {
        return $this->entity_type;
    }

    public function lookPlayer(Player $player) : void
    {
        $target = $player->getPosition()->asVector3();
        $this->lookAt($target->add(0,0.75,0));
    }
}