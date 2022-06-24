<?php

namespace Ibge\Tests\Functional;

use Ibge\Tests\TestCase;

class GetStatesActionFTest extends TestCase
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
    public function testGetStatesSuccess(): void
    {
        $response = $this->runApp("POST", "external/states");

        $responseData = json_decode($response->getBody()->__toString(), true)['data'];

        $this->assertIsArray($responseData);
    }
}