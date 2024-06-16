<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240615062904 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post ADD COLUMN is_published BOOLEAN DEFAULT 0');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__post AS SELECT id, title, description, created_at, updated_at, url_img, img_path, link FROM post');
        $this->addSql('DROP TABLE post');
        $this->addSql('CREATE TABLE post (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(180) NOT NULL, description CLOB NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , url_img CLOB DEFAULT NULL, img_path CLOB DEFAULT NULL, link CLOB DEFAULT NULL)');
        $this->addSql('INSERT INTO post (id, title, description, created_at, updated_at, url_img, img_path, link) SELECT id, title, description, created_at, updated_at, url_img, img_path, link FROM __temp__post');
        $this->addSql('DROP TABLE __temp__post');
    }
}
