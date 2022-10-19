<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221018135212 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP CONSTRAINT fk_d34a04adb852c405');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT fk_d34a04ad4d16c4dd');
        $this->addSql('DROP INDEX idx_d34a04adb852c405');
        $this->addSql('DROP INDEX idx_d34a04ad4d16c4dd');
        $this->addSql('ALTER TABLE product DROP shop_id_id');
        $this->addSql('ALTER TABLE product DROP shop_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA heroku_ext');
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE product ADD shop_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD shop_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT fk_d34a04adb852c405 FOREIGN KEY (shop_id_id) REFERENCES shop (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT fk_d34a04ad4d16c4dd FOREIGN KEY (shop_id) REFERENCES shop (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_d34a04adb852c405 ON product (shop_id_id)');
        $this->addSql('CREATE INDEX idx_d34a04ad4d16c4dd ON product (shop_id)');
    }
}
