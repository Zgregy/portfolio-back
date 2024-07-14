<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240714005123 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__socials_networks AS SELECT id, name, link, icon_url FROM socials_networks');
        $this->addSql('DROP TABLE socials_networks');
        $this->addSql('CREATE TABLE socials_networks (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, link VARCHAR(255) NOT NULL, icon_url VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL)');
        $this->addSql('INSERT INTO socials_networks (id, name, link, icon_url) SELECT id, name, link, icon_url FROM __temp__socials_networks');
        $this->addSql('DROP TABLE __temp__socials_networks');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__socials_networks AS SELECT id, name, link, icon_url FROM socials_networks');
        $this->addSql('DROP TABLE socials_networks');
        $this->addSql('CREATE TABLE socials_networks (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, link VARCHAR(255) NOT NULL, icon_url VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO socials_networks (id, name, link, icon_url) SELECT id, name, link, icon_url FROM __temp__socials_networks');
        $this->addSql('DROP TABLE __temp__socials_networks');
    }
}
