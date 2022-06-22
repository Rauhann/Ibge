<?php

namespace Ibge\Src\Entities;

class Entity
{
    public mixed $db;

    public function __construct()
    {
        $this->db = $this->getDb();
    }

    /**
     * Retorna container atual instanciado.
     *
     * @return mixed
     */
    private function getContainer(): mixed
    {
        return $GLOBALS['app']->getContainer();
    }

    /**
     * Retorna instancia de banco.
     *
     * @return mixed
     */
    private function getDb(): mixed
    {
        return $this->getContainer()->get(\PDO::class);
    }

    /**
     * Faz o prepare da query para evitar SQL Injection
     *
     * @param string $query
     * @param array $params
     * @return mixed
     */
    public function query(
        string $query,
        array  $params
    ): mixed
    {
        $stmt = $this->db->prepare("$query");

        for ($i = 1; $i <= count($params); $i++) {
            $stmt->bindValue($i, $params[$i - 1]);
        }

        $stmt->execute();

        return $stmt;
    }
}