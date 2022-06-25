<?php

namespace Ibge\Tests\Functional;

use Ibge\Tests\TestCase;

class GetDistrictsActionFTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Retorna distritos e salva no banco
     *
     * @return void
     */
    public function testGetDistrictsSuccess(): void
    {
        $response = $this->runApp("POST", "external/districts");

        $responseData = json_decode($response->getBody()->__toString(), true)['data'];

        $this->assertIsArray($responseData);
    }
}