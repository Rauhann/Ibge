<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class RegionsMigration extends AbstractMigration
{
    /**
     * Migrate
     *
     * @return void
     */
    public function up(): void
    {
        $this->execute("CREATE TABLE regions (
            id INT NOT NULL,
            name VARCHAR(20) NOT NULL,
            initials VARCHAR(2) NOT NULL,
            created_at TIMESTAMPTZ NOT NULL DEFAULT NOW(),
            updated_at TIMESTAMPTZ NOT NULL DEFAULT NOW(),
            PRIMARY KEY (id)
        )");
    }

    /**
     * Rollback
     *
     * @return void
     */
    public function down(): void
    {
        $this->execute("DROP TABLE regions");
    }
}
