<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220707111838 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creation de la table stagiaires en base de données';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE stagiaires (id INT AUTO_INCREMENT NOT NULL, genre VARCHAR(30) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, date_de_naissance DATE NOT NULL, pays_de_naissance VARCHAR(50) NOT NULL, lieu_de_naissance VARCHAR(50) NOT NULL, nationalite VARCHAR(50) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal INT NOT NULL, commune VARCHAR(50) NOT NULL, province VARCHAR(50) NOT NULL, pays VARCHAR(50) NOT NULL, gsm VARCHAR(50) NOT NULL, ligne_fixe VARCHAR(40) DEFAULT NULL, email VARCHAR(100) NOT NULL, registre_national VARCHAR(50) NOT NULL, frais_de_deplacement VARCHAR(50) NOT NULL, compte_bancaire_iban VARCHAR(50) NOT NULL, cess TINYINT(1) NOT NULL, status VARCHAR(50) NOT NULL, inscrit TINYINT(1) NOT NULL, date_de_creation DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, date_de_modification DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE stagiaires');
    }
}
