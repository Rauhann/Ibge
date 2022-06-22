<?php

class RegionFactory extends Factory
{
    protected string $table = 'regions';

    public function columns(): array
    {
        return [
            'name' => $this->faker->name
        ];
    }
}