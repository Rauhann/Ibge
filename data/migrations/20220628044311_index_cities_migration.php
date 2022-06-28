<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class IndexCitiesMigration extends AbstractMigration
{
    /**
     * Migrate
     *
     * @return void
     */
    public function up(): void
    {
        $this->execute("CREATE INDEX cities_name ON cities USING btree (name)");
    }

    /**
     * Rollback
     *
     * @return void
     */
    public function down(): void
    {
        $this->execute("DROP INDEX cities_name");
    }
}
