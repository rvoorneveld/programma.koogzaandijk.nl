<?php

namespace Tests\Unit;

use App\ClubpluginRequest;
use App\Request;
use Mockery as m;
use PHPUnit\Framework\TestCase;

class ClubpluginRequestTest extends TestCase
{

    public function testClubpluginRequestRequiresTheRequest(): void
    {
       $this->assertInstanceOf(Request::class, new ClubpluginRequest());
       $this->assertClassHasAttribute('type', $requestClassName = ClubpluginRequest::class);
       $this->assertClassHasAttribute('team', $requestClassName);
    }

    public function testGetUrlReturnsTheDefaultUrl(): void
    {
        $requestUrl = ($request = new ClubpluginRequest())->getUrl();

        $this->assertEquals($this->getBaseUrl($request), $requestUrl);
    }

    public function testDefaultUrlHasATrailingSlash(): void
    {
        $requestUrl = (new ClubpluginRequest())->getUrl();

        $this->assertSame('/', substr($requestUrl, -1));
    }

    public function testGetUrlReturnsTheTeamsOverviewUrl(): void
    {
        $_GET = [
            'type' => 'teams',
        ];
        $requestUrl = ($request = new ClubpluginRequest())->getUrl();

        $this->assertSame($this->getBaseUrl($request).$request::URL_TEAMS, $requestUrl);
    }

    public function testGetUrlReturnsASingleTeamUrl(): void
    {
        $_GET = [
            'type' => 'team',
            'team' => 'A1',
        ];
        $requestUrl = (new ClubpluginRequest())->getUrl();

        $this->assertStringContainsString('/team/', $requestUrl);
        $this->assertStringNotContainsString('/A1', $requestUrl);
    }

    private function getBaseUrl(ClubpluginRequest $request): string
    {
        return $request::URL_BASE.$request::ONSWEB_CLUBPLUGIN_CODE.DIRECTORY_SEPARATOR;
    }

}
