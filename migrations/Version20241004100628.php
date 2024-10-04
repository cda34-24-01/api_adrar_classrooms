<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241004100628 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cours (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, level VARCHAR(255) NOT NULL, estimated_time TIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, files VARCHAR(255) DEFAULT NULL, validated TINYINT(1) DEFAULT NULL, content LONGTEXT NOT NULL, language_id INT NOT NULL, INDEX IDX_FDCA8C9C82F1BAF4 (language_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE languages (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9C82F1BAF4 FOREIGN KEY (language_id) REFERENCES languages (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9C82F1BAF4');
        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE languages');
    }
}
