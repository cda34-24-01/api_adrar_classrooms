<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241004102757 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chapters (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(75) NOT NULL, content LONGTEXT NOT NULL, description LONGTEXT DEFAULT NULL, validated TINYINT(1) DEFAULT NULL, cours_id INT DEFAULT NULL, INDEX IDX_C72143717ECF78B0 (cours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE concessionnaire (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(75) NOT NULL, groupe VARCHAR(255) NOT NULL, adresse_numero INT NOT NULL, adresse_rue VARCHAR(150) NOT NULL, adresse_ville VARCHAR(100) NOT NULL, adresse_cp VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE chapters ADD CONSTRAINT FK_C72143717ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chapters DROP FOREIGN KEY FK_C72143717ECF78B0');
        $this->addSql('DROP TABLE chapters');
        $this->addSql('DROP TABLE concessionnaire');
    }
}
