<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190108170715 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE mouvement ADD piece_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE mouvement ADD CONSTRAINT FK_5B51FC3EC40FCFA8 FOREIGN KEY (piece_id) REFERENCES piece (id)');
        $this->addSql('CREATE INDEX IDX_5B51FC3EC40FCFA8 ON mouvement (piece_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE mouvement DROP FOREIGN KEY FK_5B51FC3EC40FCFA8');
        $this->addSql('DROP INDEX IDX_5B51FC3EC40FCFA8 ON mouvement');
        $this->addSql('ALTER TABLE mouvement DROP piece_id');
    }
}
