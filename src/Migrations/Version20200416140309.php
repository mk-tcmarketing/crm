<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200416140309 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE chiffre');
        $this->addSql('ALTER TABLE client CHANGE societe_id societe_id INT DEFAULT NULL, CHANGE chiffre_affaire_id chiffre_affaire_id INT DEFAULT NULL, CHANGE function function VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE devis ADD referance VARCHAR(255) NOT NULL, ADD mentant INT NOT NULL');
        $this->addSql('ALTER TABLE rendez_vous CHANGE date date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE societe CHANGE adress adress VARCHAR(255) DEFAULT NULL, CHANGE contact contact VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE chiffre (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE client CHANGE societe_id societe_id INT DEFAULT NULL, CHANGE chiffre_affaire_id chiffre_affaire_id INT DEFAULT NULL, CHANGE function function VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE devis DROP referance, DROP mentant');
        $this->addSql('ALTER TABLE rendez_vous CHANGE date date DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE societe CHANGE adress adress VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE contact contact VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
