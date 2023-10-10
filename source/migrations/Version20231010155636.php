<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231010155636 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE holiday ADD links JSON DEFAULT NULL');
        $this->addSql('ALTER TABLE holiday ALTER date TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE holiday ALTER date DROP NOT NULL');
        $this->addSql('COMMENT ON COLUMN holiday.date IS \'(DC2Type:carbondatetime)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE holiday DROP links');
        $this->addSql('ALTER TABLE holiday ALTER date TYPE DATE');
        $this->addSql('ALTER TABLE holiday ALTER date SET NOT NULL');
        $this->addSql('COMMENT ON COLUMN holiday.date IS NULL');
    }
}
