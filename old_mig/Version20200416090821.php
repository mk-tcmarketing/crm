<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200416090821 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE client CHANGE societe_id societe_id INT DEFAULT NULL, CHANGE function function VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0A91EF7EAA');
        $this->addSql('DROP INDEX IDX_65E8AA0A91EF7EAA ON rendez_vous');
        $this->addSql('ALTER TABLE rendez_vous ADD reference VARCHAR(255) NOT NULL, CHANGE date date DATETIME DEFAULT NULL, CHANGE rendez_vous_id client_id INT NOT NULL');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0A19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_65E8AA0A19EB6921 ON rendez_vous (client_id)');
        $this->addSql('ALTER TABLE societe CHANGE adress adress VARCHAR(255) DEFAULT NULL, CHANGE contact contact VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE client CHANGE societe_id societe_id INT DEFAULT NULL, CHANGE function function VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0A19EB6921');
        $this->addSql('DROP INDEX IDX_65E8AA0A19EB6921 ON rendez_vous');
        $this->addSql('ALTER TABLE rendez_vous DROP reference, CHANGE date date DATETIME DEFAULT \'NULL\', CHANGE client_id rendez_vous_id INT NOT NULL');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0A91EF7EAA FOREIGN KEY (rendez_vous_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_65E8AA0A91EF7EAA ON rendez_vous (rendez_vous_id)');
        $this->addSql('ALTER TABLE societe CHANGE adress adress VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE contact contact VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
