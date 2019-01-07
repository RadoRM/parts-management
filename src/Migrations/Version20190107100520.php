<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190107100520 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE famille (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE piece (id INT AUTO_INCREMENT NOT NULL, fournisseur_id INT DEFAULT NULL, famille_id INT DEFAULT NULL, sous_famille_id INT DEFAULT NULL, location VARCHAR(255) NOT NULL, stock_quantity INT NOT NULL, INDEX IDX_44CA0B23670C757F (fournisseur_id), INDEX IDX_44CA0B2397A77B84 (famille_id), INDEX IDX_44CA0B2371DF2E6E (sous_famille_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sous_famille (id INT AUTO_INCREMENT NOT NULL, famille_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_77A8A5E97A77B84 (famille_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mouvement (id INT AUTO_INCREMENT NOT NULL, piece_id INT DEFAULT NULL, quantity INT NOT NULL, dimension NUMERIC(10, 2) NOT NULL, weight NUMERIC(10, 2) DEFAULT NULL, machine_attribution VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, type INT NOT NULL, INDEX IDX_5B51FC3EC40FCFA8 (piece_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE piece ADD CONSTRAINT FK_44CA0B23670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE piece ADD CONSTRAINT FK_44CA0B2397A77B84 FOREIGN KEY (famille_id) REFERENCES famille (id)');
        $this->addSql('ALTER TABLE piece ADD CONSTRAINT FK_44CA0B2371DF2E6E FOREIGN KEY (sous_famille_id) REFERENCES sous_famille (id)');
        $this->addSql('ALTER TABLE sous_famille ADD CONSTRAINT FK_77A8A5E97A77B84 FOREIGN KEY (famille_id) REFERENCES famille (id)');
        $this->addSql('ALTER TABLE mouvement ADD CONSTRAINT FK_5B51FC3EC40FCFA8 FOREIGN KEY (piece_id) REFERENCES piece (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE piece DROP FOREIGN KEY FK_44CA0B2397A77B84');
        $this->addSql('ALTER TABLE sous_famille DROP FOREIGN KEY FK_77A8A5E97A77B84');
        $this->addSql('ALTER TABLE piece DROP FOREIGN KEY FK_44CA0B23670C757F');
        $this->addSql('ALTER TABLE mouvement DROP FOREIGN KEY FK_5B51FC3EC40FCFA8');
        $this->addSql('ALTER TABLE piece DROP FOREIGN KEY FK_44CA0B2371DF2E6E');
        $this->addSql('DROP TABLE famille');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE piece');
        $this->addSql('DROP TABLE sous_famille');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE mouvement');
    }
}
