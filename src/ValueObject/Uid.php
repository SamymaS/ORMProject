<?php

namespace App\ValueObject;

class Uid
{
    private string $value;

    public function __construct(string $value)
    {
        if (!preg_match('/^[a-zA-Z0-9\-]{36}$/', $value)) {
            throw new \InvalidArgumentException("Identifiant UID invalide : $value");
        }

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
