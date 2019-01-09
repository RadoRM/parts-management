<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190108170908 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE mouvement DROP FOREIGN KEY FK_5B51FC3E670C757F');
        $this->addSql('ALTER TABLE mouvement DROP FOREIGN KEY FK_5B51FC3E71DF2E6E');
        $this->addSql('ALTER TABLE mouvement DROP FOREIGN KEY FK_5B51FC3E97A77B84');
        $this->addSql('DROP INDEX IDX_5B51FC3E97A77B84 ON mouvement');
        $this->addSql('DROP INDEX IDX_5B51FC3E670C757F ON mouvement');
        $this->addSql('DROP INDEX IDX_5B51FC3E71DF2E6E ON mouvement');
        $this->addSql('ALTER TABLE mouvement DROP fournisseur_id, DROP famille_id, DROP sous_famille_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE mouvement ADD fournisseur_id INT DEFAULT NULL, ADD famille_id INT DEFAULT NULL, ADD sous_famille_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE mouvement ADD CONSTRAINT FK_5B51FC3E670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE mouvement ADD CONSTRAINT FK_5B51FC3E71DF2E6E FOREIGN KEY (sous_famille_id) REFERENCES sous_famille (id)');
        $this->addSql('ALTER TABLE mouvement ADD CONSTRAINT FK_5B51FC3E97A77B84 FOREIGN KEY (famille_id) REFERENCES famille (id)');
        $this->addSql('CREATE INDEX IDX_5B51FC3E97A77B84 ON mouvement (famille_id)');
        $this->addSql('CREATE INDEX IDX_5B51FC3E670C757F ON mouvement (fournisseur_id)');
        $this->addSql('CREATE INDEX IDX_5B51FC3E71DF2E6E ON mouvement (sous_famille_id)');
    }
}
