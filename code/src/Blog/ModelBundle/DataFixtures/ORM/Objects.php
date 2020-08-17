<?php

namespace ModelBundle\DataFixtures\ORM;


class Objects {
    const AUTHOR = 'author';
    const AUTHOR_COUNT = 10;

    const POST = 'post';
    const POST_COUNT = 30;

    const COUNT_POSTFIX = 'count';

    public static function getInstance($entityName, $fixture) {
        $entityCountKey = strtoupper($entityName)."_".strtoupper(self::COUNT_POSTFIX);
        $entityCount = constant('self::'. $entityCountKey);
        return $fixture->getReference($entityName.rand(0, ($entityCount - 1)));
    }
}