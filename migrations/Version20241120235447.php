<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241120235447 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE departement (id INT AUTO_INCREMENT NOT NULL, info VARCHAR(50) NOT NULL, tic VARCHAR(50) NOT NULL, gc VARCHAR(50) NOT NULL, em VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, type_doc_id INT NOT NULL, stage_id INT NOT NULL, date_emission DATETIME NOT NULL, INDEX IDX_D8698A76AA812384 (type_doc_id), INDEX IDX_D8698A762298D193 (stage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enseignant (id INT AUTO_INCREMENT NOT NULL, departement_id INT NOT NULL, remarque VARCHAR(50) NOT NULL, INDEX IDX_81A72FA1CCF9E01E (departement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, cv VARCHAR(100) NOT NULL, competence VARCHAR(100) NOT NULL, progression VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, type_ev_id INT NOT NULL, nom_ev VARCHAR(50) NOT NULL, date_ev DATETIME NOT NULL, capacite VARCHAR(50) NOT NULL, INDEX IDX_B26681E4EA86BB5 (type_ev_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participant (id INT AUTO_INCREMENT NOT NULL, nom_p VARCHAR(50) NOT NULL, prenom_p VARCHAR(50) NOT NULL, age VARCHAR(50) NOT NULL, email_p VARCHAR(50) NOT NULL, tel_p VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participant_evenement (participant_id INT NOT NULL, evenement_id INT NOT NULL, INDEX IDX_C824A73A9D1C3019 (participant_id), INDEX IDX_C824A73AFD02F13 (evenement_id), PRIMARY KEY(participant_id, evenement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, type_reclamation_id INT NOT NULL, etudiant_id INT NOT NULL, reponse_id INT NOT NULL, date_reclamation DATETIME NOT NULL, INDEX IDX_CE6064047BA88B4D (type_reclamation_id), INDEX IDX_CE606404DDEAB1A3 (etudiant_id), UNIQUE INDEX UNIQ_CE606404CF18BB82 (reponse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponse (id INT AUTO_INCREMENT NOT NULL, date_reponse DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stage (id INT AUTO_INCREMENT NOT NULL, type_stage_id INT NOT NULL, enseignant_id INT NOT NULL, etudiant_id INT NOT NULL, titre VARCHAR(50) NOT NULL, description VARCHAR(50) NOT NULL, date_limite DATETIME NOT NULL, INDEX IDX_C27C9369EF67F66F (type_stage_id), INDEX IDX_C27C9369E455FCC0 (enseignant_id), UNIQUE INDEX UNIQ_C27C9369DDEAB1A3 (etudiant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_document (id INT AUTO_INCREMENT NOT NULL, rapport VARCHAR(50) NOT NULL, attestation VARCHAR(50) NOT NULL, journal VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_evenement (id INT AUTO_INCREMENT NOT NULL, journees_portes_ouvertes VARCHAR(50) NOT NULL, workshop VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_reclamation (id INT AUTO_INCREMENT NOT NULL, manque_encadrement VARCHAR(50) NOT NULL, manque_ressources VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_stage (id INT AUTO_INCREMENT NOT NULL, pfe VARCHAR(50) NOT NULL, immersion VARCHAR(50) NOT NULL, ingenieur VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, tel VARCHAR(50) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A76AA812384 FOREIGN KEY (type_doc_id) REFERENCES type_document (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A762298D193 FOREIGN KEY (stage_id) REFERENCES stage (id)');
        $this->addSql('ALTER TABLE enseignant ADD CONSTRAINT FK_81A72FA1CCF9E01E FOREIGN KEY (departement_id) REFERENCES departement (id)');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681E4EA86BB5 FOREIGN KEY (type_ev_id) REFERENCES type_evenement (id)');
        $this->addSql('ALTER TABLE participant_evenement ADD CONSTRAINT FK_C824A73A9D1C3019 FOREIGN KEY (participant_id) REFERENCES participant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE participant_evenement ADD CONSTRAINT FK_C824A73AFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE6064047BA88B4D FOREIGN KEY (type_reclamation_id) REFERENCES type_reclamation (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404CF18BB82 FOREIGN KEY (reponse_id) REFERENCES reponse (id)');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369EF67F66F FOREIGN KEY (type_stage_id) REFERENCES type_stage (id)');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369E455FCC0 FOREIGN KEY (enseignant_id) REFERENCES enseignant (id)');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A76AA812384');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A762298D193');
        $this->addSql('ALTER TABLE enseignant DROP FOREIGN KEY FK_81A72FA1CCF9E01E');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681E4EA86BB5');
        $this->addSql('ALTER TABLE participant_evenement DROP FOREIGN KEY FK_C824A73A9D1C3019');
        $this->addSql('ALTER TABLE participant_evenement DROP FOREIGN KEY FK_C824A73AFD02F13');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE6064047BA88B4D');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404DDEAB1A3');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404CF18BB82');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369EF67F66F');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369E455FCC0');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369DDEAB1A3');
        $this->addSql('DROP TABLE departement');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE enseignant');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE participant');
        $this->addSql('DROP TABLE participant_evenement');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE reponse');
        $this->addSql('DROP TABLE stage');
        $this->addSql('DROP TABLE type_document');
        $this->addSql('DROP TABLE type_evenement');
        $this->addSql('DROP TABLE type_reclamation');
        $this->addSql('DROP TABLE type_stage');
        $this->addSql('DROP TABLE user');
    }
}
