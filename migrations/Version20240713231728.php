<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240713231728 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skills ADD COLUMN description CLOB NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__skills AS SELECT id, name, proficiency_level, icon_url FROM skills');
        $this->addSql('DROP TABLE skills');
        $this->addSql('CREATE TABLE skills (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, proficiency_level VARCHAR(255) NOT NULL, icon_url VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO skills (id, name, proficiency_level, icon_url) SELECT id, name, proficiency_level, icon_url FROM __temp__skills');
        $this->addSql('DROP TABLE __temp__skills');
    }
}
