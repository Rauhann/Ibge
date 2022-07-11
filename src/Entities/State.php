<?php

namespace Ibge\Src\Entities;

class State extends Entity
{
    protected string $table = 'states';

    public function findFiltered(
        array $columns,
        ?int $id,
        ?string $name,
        ?string $initials,
        ?int $regionId,
        int $pageSize = 100,
        int $pageNumber = 1
    ) {
        $parsedColumns = $columns ? implode(',', $columns) :  ' * ';

        $whereAndParams = $this->setWhereAndParams($id, $name, $initials, $regionId);

        $offset = $this->calcOffset($pageNumber, $pageSize);

        $stmt = $this->query(
            "SELECT
                $parsedColumns
            FROM
                {$this->table}
            {$whereAndParams['where_string']}
            ORDER BY
                created_at
            DESC
            LIMIT {$pageSize}
            OFFSET {$offset}
            ",
            $whereAndParams['parameters']
        );

        if ($stmt) {
            return $stmt->fetchAll();
        }
    }

    private function setWhereAndParams(
        ?int $id,
        ?string $name,
        ?string $initials,
        ?int $regionId
    ): array {
        $params = [];
        $whereArray = [];

        if ($id) {
            $params[] = $id;
            $whereArray[] = 'id = ?';
        }

        if ($name) {
            $params[] = $name;
            $whereArray[] = 'name = ?';
        }

        if ($initials) {
            $params[] = $initials;
            $whereArray[] = 'initials = ?';
        }

        if ($regionId) {
            $regionId[] = $regionId;
            $regionId[] = 'region_id = ?';
        }

        $whereString = $whereArray
            ? $this->buildWhereString($whereArray)
            : '';

        return [
            'where_string' => $whereString,
            'parameters' => $params,
        ];
    }

    private function buildWhereString(array $whereArray)
    {
        return ' where ' . implode(' and ', $whereArray);
    }

    private function calcOffset(int $pageNumber, int $pageSize)
    {
        return max(0, ($pageNumber - 1) * $pageSize);
    }
}
