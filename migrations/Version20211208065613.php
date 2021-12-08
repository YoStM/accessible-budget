<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211208065613 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE account_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE bank_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE budget_objective_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE company_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE transaction_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE account (id INT NOT NULL, bank_id INT DEFAULT NULL, owner_id INT NOT NULL, acc_number VARCHAR(6) NOT NULL, label VARCHAR(55) NOT NULL, balance NUMERIC(10, 2) NOT NULL, is_preferred BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7D3656A411C8FB41 ON account (bank_id)');
        $this->addSql('CREATE INDEX IDX_7D3656A47E3C61F9 ON account (owner_id)');
        $this->addSql('CREATE TABLE bank (id INT NOT NULL, code VARCHAR(4) NOT NULL, name VARCHAR(95) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE budget_objective (id INT NOT NULL, category_id INT NOT NULL, owner_id INT NOT NULL, amount NUMERIC(10, 2) NOT NULL, statut VARCHAR(55) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_68FA59A112469DE2 ON budget_objective (category_id)');
        $this->addSql('CREATE INDEX IDX_68FA59A17E3C61F9 ON budget_objective (owner_id)');
        $this->addSql('CREATE TABLE category (id INT NOT NULL, label VARCHAR(95) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE company (id INT NOT NULL, name VARCHAR(95) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE transaction (id INT NOT NULL, category_id INT NOT NULL, company_id INT NOT NULL, account_id INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, tr_type VARCHAR(55) NOT NULL, is_monthly BOOLEAN NOT NULL, is_verified BOOLEAN NOT NULL, description VARCHAR(95) DEFAULT NULL, amount NUMERIC(10, 2) NOT NULL, payment_method VARCHAR(55) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_723705D112469DE2 ON transaction (category_id)');
        $this->addSql('CREATE INDEX IDX_723705D1979B1AD6 ON transaction (company_id)');
        $this->addSql('CREATE INDEX IDX_723705D19B6B5FBA ON transaction (account_id)');
        $this->addSql('COMMENT ON COLUMN transaction.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE account ADD CONSTRAINT FK_7D3656A411C8FB41 FOREIGN KEY (bank_id) REFERENCES bank (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE account ADD CONSTRAINT FK_7D3656A47E3C61F9 FOREIGN KEY (owner_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE budget_objective ADD CONSTRAINT FK_68FA59A112469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE budget_objective ADD CONSTRAINT FK_68FA59A17E3C61F9 FOREIGN KEY (owner_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D112469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D19B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE transaction DROP CONSTRAINT FK_723705D19B6B5FBA');
        $this->addSql('ALTER TABLE account DROP CONSTRAINT FK_7D3656A411C8FB41');
        $this->addSql('ALTER TABLE budget_objective DROP CONSTRAINT FK_68FA59A112469DE2');
        $this->addSql('ALTER TABLE transaction DROP CONSTRAINT FK_723705D112469DE2');
        $this->addSql('ALTER TABLE transaction DROP CONSTRAINT FK_723705D1979B1AD6');
        $this->addSql('DROP SEQUENCE account_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE bank_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE budget_objective_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE category_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE company_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE transaction_id_seq CASCADE');
        $this->addSql('DROP TABLE account');
        $this->addSql('DROP TABLE bank');
        $this->addSql('DROP TABLE budget_objective');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE transaction');
    }
}
