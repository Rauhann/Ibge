<?php

namespace Ibge\Tests\Functional;

use Ibge\Tests\TestCase;

class GetCitiesActionFTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Retorna municipios e salva no banco
     *
     * @return void
     */
    public function testGetCitiesSuccess(): void
    {
        $response = $this->runApp("POST", "external/cities");

        $responseData = json_decode($response->getBody()->__toString(), true)['data'];

        $this->assertIsArray($responseData);
    }
}