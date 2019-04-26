<?php

namespace App;

class ClubpluginRequest extends Request
{

    public const URL_BASE = '//www2.knkv.nl/kcp/';
    public const URL_TEAMS = 'teams_url';
    public const URL_TEAM = 'team';
    public const ONSWEB_CLUBPLUGIN_CODE = 'ef0baad8aa6d23b60';

    public const TYPE_TEAMS = 'teams';
    public const TYPE_TEAM = 'team';
    public const TEAMS = [
        '1' => '12935,28372',
        '2' => '13354,30143',
        '3' => '13646,30031',
        '4' => '13847,31463',
        '5' => '32382,13983',
        '6' => '32886,14067',
        '7' => '14122,32944',
        '8' => '14153,29049',
        '9' => '14172,29068',
        '10' => '13144,25260',
        'A1' => '14369,28471',
        'A2' => '14617,25592',
        'A3' => '25921,14708',
        'A4' => '26174,14745',
        'A5' => '38083,38083,38382',
        'B1' => '14986,27586',
        'B2' => '30227,15250',
        'C1' => '15643,32832',
        'C2' => '29721,15917',
        'B3' => '30788,15347',
        'B4' => '15390,30836',
        'C3' => '27157,16033',
        'C4' => '27432,16082',
        'C5' => '16108',
        'D1' => '24655,16346',
        'D2' => '26296,16617',
        'D3' => '16740,26856',
        'D4' => '16798,27127',
        'E1' => '28840,17071',
        'E2' => '26236,17340',
        'E3' => '17448,26823',
        'E4' => '18832,32163',
        'E5' => '18839,30901',
        'F1' => '26277,17658',
        'F2' => '17792,25309',
        'F3' => '26095',
        'F4' => '17861',
    ];

    public function getUrl(): string
    {
        if (true === $this->isTeamUrl()) {
            $strUrl = $this->getTeamUrl();
        }
        if (true === $this->isTeamsOverviewUrl()) {
            $strUrl = $this->getTeamsOverviewUrl();
        }
        return $strUrl ?? $this->getDefaultUrl();
    }

    protected function getBaseUrl(): string
    {
        return static::URL_BASE.static::ONSWEB_CLUBPLUGIN_CODE.DIRECTORY_SEPARATOR;
    }

    protected function getDefaultUrl(): string
    {
        return $this->getBaseUrl();
    }

    protected function getTeamUrl(): string
    {
        return $this->getBaseUrl().static::URL_TEAM.DIRECTORY_SEPARATOR.static::TEAMS[$this->getTeam()];
    }

    protected function getTeamsOverviewUrl(): string
    {
        return $this->getBaseUrl().static::URL_TEAMS;
    }

    protected function isTeamUrl(): bool
    {
        return  null !== $this->type && static::TYPE_TEAM === $this->type
                && null !== $this->team && true === $this->isValidTeam($this->team);
    }

    protected function isTeamsOverviewUrl(): bool
    {
        return null !== $this->type && static::TYPE_TEAMS === $this->type;
    }

    protected function isValidTeam(string $team): bool
    {
        return array_key_exists($team, static::TEAMS);
    }

}
