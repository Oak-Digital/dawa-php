<?php

namespace Oakdigital\DawaPhp\Entities;

class Entity
{
    protected string $entity_id;

    public function getID()
    {
        return $this->entity_id;
    }

    public static function fromID(string $id)
    {
    }
}
