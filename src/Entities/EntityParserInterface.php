<?php

namespace Oakdigital\DawaPhp\Entities;

interface EntityParserInterface
{
    public function parse(array $data): Entity;
}
