<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221018024144 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE shop DROP shop_name');
        $this->addSql('ALTER TABLE shop DROP shop_email');
        $this->addSql('ALTER TABLE shop DROP shop_telephone');
        $this->addSql('ALTER TABLE shop DROP shop_address');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA heroku_ext');
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE shop ADD shop_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE shop ADD shop_email VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE shop ADD shop_telephone VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE shop ADD shop_address VARCHAR(255) NOT NULL');
    }
}
