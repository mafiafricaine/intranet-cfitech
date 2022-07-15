<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220708115503 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creation de la class Formation et la relation entre elle et Stagiaire';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, max_stagiaire INT NOT NULL, duree VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stagiaires ADD formation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stagiaires ADD CONSTRAINT FK_4A9FADC65200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX IDX_4A9FADC65200282E ON stagiaires (formation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stagiaires DROP FOREIGN KEY FK_4A9FADC65200282E');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP INDEX IDX_4A9FADC65200282E ON stagiaires');
        $this->addSql('ALTER TABLE stagiaires DROP formation_id');
    }
}
