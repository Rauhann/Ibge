<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class TimezoneMigration extends AbstractMigration
{
    /**
     * Migrate
     *
     * @return void
     */
    public function up(): void
    {
        $this->execute("SET timezone = 'America/Sao_Paulo'");
    }

    /**
     * Rollback
     *
     * @return void
     */
    public function down(): void
    {
        $this->execute("SET timezone = 'UTC'");
    }
}
