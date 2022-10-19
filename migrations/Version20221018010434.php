<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221018010434 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product ADD shop_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD4D16C4DD FOREIGN KEY (shop_id) REFERENCES shop (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_D34A04AD4D16C4DD ON product (shop_id)');
        $this->addSql('ALTER TABLE shop ADD shop_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE shop ADD shop_email VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE shop ADD shop_telephone VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE shop ADD shop_address VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA heroku_ext');
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE shop DROP shop_name');
        $this->addSql('ALTER TABLE shop DROP shop_email');
        $this->addSql('ALTER TABLE shop DROP shop_telephone');
        $this->addSql('ALTER TABLE shop DROP shop_address');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT FK_D34A04AD4D16C4DD');
        $this->addSql('DROP INDEX IDX_D34A04AD4D16C4DD');
        $this->addSql('ALTER TABLE product DROP shop_id');
    }
}
