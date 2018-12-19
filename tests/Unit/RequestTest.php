<?php

namespace Tests\Unit;

use App\Request;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{

    public function setUp()
    {
        $_GET = [];
    }

    public function testAttributesAreSetInConstruct(): void
    {
        $request = new Request();

        $this->assertNull($request->type);
        $this->assertNull($request->team);
    }

    public function testItSetsAttributesWhenInGetRequest(): void
    {
        $_GET = [
            'type' => 'foo',
            'team' => 'bar',
        ];
        $request = new Request();

        $this->assertSame('foo', $request->type);
        $this->assertSame('bar', $request->team);
    }

    public function testAttributesCanBeRetrievedByTheirOwnMethods(): void
    {
        $_GET = [
            'type' => 'baz',
            'team' => 'qux',
        ];
        $request = new Request();

        $this->assertSame('baz', $request->getType());
        $this->assertSame('qux', $request->getTeam());
    }

}
