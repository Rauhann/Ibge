<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class StatesMigration extends AbstractMigration
{
    /**
     * Migrate
     *
     * @return void
     */
    public function up(): void
    {
        $this->execute("CREATE TABLE states (
            id INT NOT NULL,
            name VARCHAR(20) NOT NULL,
            initials VARCHAR(2) NOT NULL,
            region_id INT NOT NULL,
            created_at TIMESTAMPTZ NOT NULL DEFAULT NOW(),
            updated_at TIMESTAMPTZ NOT NULL DEFAULT NOW(),
            PRIMARY KEY (id), 
            FOREIGN KEY (region_id) REFERENCES regions(id) ON DELETE RESTRICT ON UPDATE CASCADE
        )");
    }

    /**
     * Rollback
     *
     * @return void
     */
    public function down(): void
    {
        $this->execute("DROP TABLE states");
    }
}
