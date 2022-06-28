<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class IndexDistrictsMigration extends AbstractMigration
{
    /**
     * Migrate
     *
     * @return void
     */
    public function up(): void
    {
        $this->execute("CREATE INDEX districts_name ON districts USING btree (name)");
    }

    /**
     * Rollback
     *
     * @return void
     */
    public function down(): void
    {
        $this->execute("DROP INDEX districts_name");
    }
}
