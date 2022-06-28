<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UserDeveloperMigration extends AbstractMigration
{
    /**
     * Migrate
     *
     * @return void
     */
    public function up(): void
    {
        $this->execute("CREATE USER developer WITH PASSWORD 'developer'");
        $this->execute("GRANT SELECT, INSERT, UPDATE, DELETE ON ALL TABLES IN SCHEMA public TO developer");
        $this->execute("GRANT USAGE ON SCHEMA public TO developer");
    }

    /**
     * Rollback
     *
     * @return void
     */
    public function down(): void
    {
        $this->execute("REVOKE ALL PRIVILEGES ON ALL TABLES IN SCHEMA public FROM developer CASCADE");
        $this->execute("REVOKE ALL PRIVILEGES ON SCHEMA public FROM developer CASCADE");
        $this->execute("DROP ROLE developer");
    }
}
