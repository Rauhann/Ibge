<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UpdatePublicMigrate extends AbstractMigration
{
    /**
     * Migrate
     *
     * @return void
     */
    public function up(): void
    {
        $this->execute("REVOKE ALL ON schema public FROM public");
        $this->execute("GRANT ALL ON schema public TO postgres");
    }

    /**
     * Rollback
     *
     * @return void
     */
    public function down(): void
    {
        $this->execute("GRANT ALL ON schema public TO postgres");
    }
}
