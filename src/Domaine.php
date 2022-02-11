<?php

namespace BBC2050\DomaineRGE;

class Entity
{
    public string $code;
    public string $nom;
    public ?string $famille;

    public function __construct(string $code, string $nom, ?string $famille)
    {
        $this->code = $code;
        $this->nom = $nom;
        $this->famille = $famille;
    }
}
