<?php

namespace App;

class Request
{

    public const REQUEST_KEY_TYPE = 'type';
    public const REQUEST_KEY_TEAM = 'team';

    public $type;
    public $team;

    public function __construct()
    {
        $this->type = $_GET[static::REQUEST_KEY_TYPE] ?? null;
        $this->team = $_GET[static::REQUEST_KEY_TEAM] ?? null;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getTeam(): ?string
    {
        return $this->team;
    }

}
