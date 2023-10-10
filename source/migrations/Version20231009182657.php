<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231009182657 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE header_footer_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE holiday_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE home_page_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE menu_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE page_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE header_footer (id INT NOT NULL, logo VARCHAR(255) DEFAULT NULL, image_form VARCHAR(255) DEFAULT NULL, copyright TEXT NOT NULL, text_center TEXT NOT NULL, privacy_policy TEXT NOT NULL, phone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, policy_link VARCHAR(255) NOT NULL, policy_title VARCHAR(255) NOT NULL, vacancy_list_seo_title VARCHAR(255) DEFAULT NULL, vacancy_list_seo_keywords VARCHAR(255) DEFAULT NULL, vacancy_list_seo_description VARCHAR(255) DEFAULT NULL, page_list_seo_title VARCHAR(255) DEFAULT NULL, page_list_seo_keywords VARCHAR(255) DEFAULT NULL, page_list_seo_description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE header_footer_menu (header_footer_id INT NOT NULL, menu_id INT NOT NULL, PRIMARY KEY(header_footer_id, menu_id))');
        $this->addSql('CREATE INDEX IDX_99B363779473E467 ON header_footer_menu (header_footer_id)');
        $this->addSql('CREATE INDEX IDX_99B36377CCD7E912 ON header_footer_menu (menu_id)');
        $this->addSql('CREATE TABLE holiday (id INT NOT NULL, title VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, date DATE NOT NULL, slug VARCHAR(255) NOT NULL, post TEXT NOT NULL, short_text TEXT NOT NULL, button_link VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE home_page (id INT NOT NULL, full_text TEXT NOT NULL, seo_title VARCHAR(255) NOT NULL, seo_keywords VARCHAR(255) NOT NULL, seo_description VARCHAR(255) NOT NULL, title_page VARCHAR(255) NOT NULL, title_about VARCHAR(255) NOT NULL, image_date VARCHAR(255) NOT NULL, image_calendar VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE home_page_header_footer (home_page_id INT NOT NULL, header_footer_id INT NOT NULL, PRIMARY KEY(home_page_id, header_footer_id))');
        $this->addSql('CREATE INDEX IDX_13D3359FB966A8BC ON home_page_header_footer (home_page_id)');
        $this->addSql('CREATE INDEX IDX_13D3359F9473E467 ON home_page_header_footer (header_footer_id)');
        $this->addSql('CREATE TABLE menu (id INT NOT NULL, name VARCHAR(255) NOT NULL, link VARCHAR(255) NOT NULL, sort INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE page (id INT NOT NULL, title VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
        $this->addSql('ALTER TABLE header_footer_menu ADD CONSTRAINT FK_99B363779473E467 FOREIGN KEY (header_footer_id) REFERENCES header_footer (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE header_footer_menu ADD CONSTRAINT FK_99B36377CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE home_page_header_footer ADD CONSTRAINT FK_13D3359FB966A8BC FOREIGN KEY (home_page_id) REFERENCES home_page (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE home_page_header_footer ADD CONSTRAINT FK_13D3359F9473E467 FOREIGN KEY (header_footer_id) REFERENCES header_footer (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE header_footer_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE holiday_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE home_page_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE menu_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE page_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('ALTER TABLE header_footer_menu DROP CONSTRAINT FK_99B363779473E467');
        $this->addSql('ALTER TABLE header_footer_menu DROP CONSTRAINT FK_99B36377CCD7E912');
        $this->addSql('ALTER TABLE home_page_header_footer DROP CONSTRAINT FK_13D3359FB966A8BC');
        $this->addSql('ALTER TABLE home_page_header_footer DROP CONSTRAINT FK_13D3359F9473E467');
        $this->addSql('DROP TABLE header_footer');
        $this->addSql('DROP TABLE header_footer_menu');
        $this->addSql('DROP TABLE holiday');
        $this->addSql('DROP TABLE home_page');
        $this->addSql('DROP TABLE home_page_header_footer');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE page');
        $this->addSql('DROP TABLE "user"');
    }
}
