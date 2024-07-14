<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240713174834 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE education (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, degree VARCHAR(255) NOT NULL, institution VARCHAR(255) NOT NULL, period VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, diploma VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE skills (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, proficiency_level VARCHAR(255) NOT NULL, icon_url VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE socials_networks (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, link VARCHAR(255) NOT NULL, icon_url VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE works (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, company VARCHAR(255) NOT NULL, description CLOB NOT NULL, link VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE works_skills (works_id INTEGER NOT NULL, skills_id INTEGER NOT NULL, PRIMARY KEY(works_id, skills_id), CONSTRAINT FK_57103EC8F6CB822A FOREIGN KEY (works_id) REFERENCES works (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_57103EC87FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_57103EC8F6CB822A ON works_skills (works_id)');
        $this->addSql('CREATE INDEX IDX_57103EC87FF61858 ON works_skills (skills_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE education');
        $this->addSql('DROP TABLE skills');
        $this->addSql('DROP TABLE socials_networks');
        $this->addSql('DROP TABLE works');
        $this->addSql('DROP TABLE works_skills');
    }
}
