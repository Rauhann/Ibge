<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class ConfigMigration extends AbstractMigration
{
    /**
     * Migrate
     *
     * @return void
     */
    public function up(): void
    {
        // TIMESTAMP DO BANCO DE DADOS
        $this->execute("SET timezone = 'America/Sao_Paulo'");

        // CRIAR USUARIOS
    }

    /**
     * Rollback
     *
     * @return void
     */
    public function down(): void
    {
    }
}
