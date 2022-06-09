<?php

declare(strict_types=1);

namespace MIN\EntityLib;

use pocketmine\entity\EntityDataHelper;
use pocketmine\entity\EntityFactory;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\world\World;

final class EntityLibManager
{
    public static function onRegisterLibEntity(): void
    {
        EntityFactory::getInstance()->register(LibHuman::class, static function (World $world, CompoundTag $nbt): LibHuman {
            return new LibHuman(EntityDataHelper::parseLocation($nbt, $world), LibHuman::parseSkinNBT($nbt), $nbt);
        }, ['LibHuman']);
        EntityFactory::getInstance()->register(LibEntity::class, static function (World $world, CompoundTag $nbt): LibEntity {
            return new LibEntity(EntityDataHelper::parseLocation($nbt, $world), $nbt);
        }, ['LibEntity']);
    }

    public static function createEntityTypeCompoundTag(string $entity_type, ): CompoundTag
    {
        return CompoundTag::create()->setString('ENTITY_TYPE',$entity_type);
    }
}