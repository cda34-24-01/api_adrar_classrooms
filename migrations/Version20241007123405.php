<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241007123405 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chapters ADD validate TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE cours ADD description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE review CHANGE cours_id cours_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chapters DROP validate');
        $this->addSql('ALTER TABLE cours DROP description');
        $this->addSql('ALTER TABLE review CHANGE cours_id cours_id INT DEFAULT NULL');
    }
}
