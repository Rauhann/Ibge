<?php

namespace Ibge\Tests\Functional;

use Ibge\Tests\TestCase;

class GetREgionsActionFTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Retorna regioes
     *
     * @return void
     */
    public function testGetRegionsSuccess(): void
    {
        $response = $this->runApp("POST", "external/regions");

        $responseData = json_decode($response->getBody()->__toString(), true)['data'];

        $this->assertCount(5, $responseData);
    }
}