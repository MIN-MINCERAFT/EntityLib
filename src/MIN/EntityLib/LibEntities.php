<?php

declare(strict_types=1);

namespace MIN\EntityLib;

final class LibEntities
{
    public const NETWORK_ID = 0;
    public const HEIGHT = 1;
    public const WIDTH = 2;

    public static array $entities = [
        '사람' => ['minecraft:human',1.9,0.6],
        '좀비' => ['minecraft:zombie',1.9,0.6],
        '크리퍼' => ['minecraft:creeper',1.8,0.6],
        '스켈레톤' => ['minecraft:skeleton',1.9,0.6],
        '좀비피글린' => ['minecraft:zombie_pigman',1.9,0.6],
        '슬라임' => ['minecraft:slime',1.04,1.04],
        '엔더맨' => ['minecraft:enderman',2.9,0.6],
        '좀벌레' => ['minecraft:silverfish',0.3,0.4],
        '거미' => ['minecraft:spider',0.5,0.7],
        '동굴거미' => ['minecraft:cave_spider',0.9,1.4],
        '가스트' => ['minecraft:ghast',4.0,4.0],
        '마그마큐브' => ['minecraft:magma_cube',4.0,4.0],
        '블레이즈' => ['minecraft:blaze',1.8,0.5],
        '주민좀비' => ['minecraft:zombie_villager',1.9,0.6],
        '마녀' => ['minecraft:witch',1.9,0.6],
        '스트레이' => ['minecraft:stray',1.9,0.6],
        '허스크' => ['minecraft:husk',2.01875,0.6375],
        '위더 스켈레톤' => ['minecraft:wither_skeleton',2.412,0.864],
        '위더' => ['minecraft:wither',3.0,1.0],
        '변명자' => ['minecraft:vindicator',1.9,0.6],
        '팬텀' => ['minecraft:phantom',1.5,0.9],
        '파괴수' => ['minecraft:ravager',1.9,1.5],
        '소환사' => ['minecraft:evocation_illager',1.9,0.6],
        '익사자' => ['minecraft:drowned',1.9,0.6],
        '닭' => ['minecraft:chicken',0.8,0.6],
        '소' => ['minecraft:cow',1.3,0.9],
        '돼지' => ['minecraft:pig',0.9,0.9],
        '양' => ['minecraft:sheep',1.3,0.9],
        '늑대' => ['minecraft:wolf',0.8,0.6],
        '주민' => ['minecraft:villager',1.9,0.6],
        '버섯소' => ['minecraft:mooshroom',1.3,0.6],
        '오징어' => ['minecraft:squid',0.95,0.95],
        '토끼' => ['minecraft:rabbit',0.25,0.2],
        '박쥐' => ['minecraft:bat',0.9,0.5],
        '눈사람' => ['minecraft:snow_golem',1.8,0.4],
        '말' => ['minecraft:horse',1.6,1.4],
        '북극곰' => ['minecraft:polar_bear',1.4,1.3],
        '벌' => ['minecraft:bee',0.5,0.55],
        '아홀로톨' => ['minecraft:axolotl',0.375,0.75],
        '염소' => ['minecraft:goat',0.9,1.3],
        '앵무새' => ['minecraft:parrot',1.0,0.5],
        '발광오징어' => ['minecraft:glow_squid',0.95,0.95]
    ];
}