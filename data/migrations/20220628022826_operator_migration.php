<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class OperatorMigration extends AbstractMigration
{
    /**
     * Migrate
     *
     * @return void
     */
    public function up(): void
    {
        $this->execute("CREATE USER operator WITH PASSWORD 'operator'");
        $this->execute("GRANT SELECT ON ALL TABLES IN SCHEMA public TO operator");
        $this->execute("GRANT USAGE ON SCHEMA public TO operator");
    }

    /**
     * Rollback
     *
     * @return void
     */
    public function down(): void
    {
        $this->execute("REVOKE ALL PRIVILEGES ON ALL TABLES IN SCHEMA public FROM operator CASCADE");
        $this->execute("REVOKE ALL PRIVILEGES ON SCHEMA public FROM operator CASCADE");
        $this->execute("DROP ROLE operator");
    }
}
