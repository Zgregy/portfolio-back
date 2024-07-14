<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240713211814 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE education ADD COLUMN specification VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE works ADD COLUMN project_type VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__education AS SELECT id, name, degree, institution, period, city, diploma FROM education');
        $this->addSql('DROP TABLE education');
        $this->addSql('CREATE TABLE education (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, degree VARCHAR(255) NOT NULL, institution VARCHAR(255) NOT NULL, period VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, diploma VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO education (id, name, degree, institution, period, city, diploma) SELECT id, name, degree, institution, period, city, diploma FROM __temp__education');
        $this->addSql('DROP TABLE __temp__education');
        $this->addSql('CREATE TEMPORARY TABLE __temp__works AS SELECT id, name, company, description, link FROM works');
        $this->addSql('DROP TABLE works');
        $this->addSql('CREATE TABLE works (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, company VARCHAR(255) NOT NULL, description CLOB NOT NULL, link VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO works (id, name, company, description, link) SELECT id, name, company, description, link FROM __temp__works');
        $this->addSql('DROP TABLE __temp__works');
    }
}
