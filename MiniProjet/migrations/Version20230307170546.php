<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230307170546 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, nb_places INT NOT NULL, commentaire LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_reservation (reservation_source INT NOT NULL, reservation_target INT NOT NULL, INDEX IDX_8EA49409177B36E8 (reservation_source), INDEX IDX_8EA49409E9E6667 (reservation_target), PRIMARY KEY(reservation_source, reservation_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trajet (id INT AUTO_INCREMENT NOT NULL, ville_depart_id INT NOT NULL, ville_arrivee_id INT NOT NULL, conducteur_id INT DEFAULT NULL, heure_depart TIME NOT NULL, modele_voiture VARCHAR(255) NOT NULL, nb_places_restantes INT DEFAULT NULL, INDEX IDX_2B5BA98C497832A6 (ville_depart_id), INDEX IDX_2B5BA98C34AC9A4B (ville_arrivee_id), INDEX IDX_2B5BA98CF16F4AC6 (conducteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trajet_user (trajet_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_825A9176D12A823 (trajet_id), INDEX IDX_825A9176A76ED395 (user_id), PRIMARY KEY(trajet_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, tel INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation_reservation ADD CONSTRAINT FK_8EA49409177B36E8 FOREIGN KEY (reservation_source) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_reservation ADD CONSTRAINT FK_8EA49409E9E6667 FOREIGN KEY (reservation_target) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE trajet ADD CONSTRAINT FK_2B5BA98C497832A6 FOREIGN KEY (ville_depart_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE trajet ADD CONSTRAINT FK_2B5BA98C34AC9A4B FOREIGN KEY (ville_arrivee_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE trajet ADD CONSTRAINT FK_2B5BA98CF16F4AC6 FOREIGN KEY (conducteur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE trajet_user ADD CONSTRAINT FK_825A9176D12A823 FOREIGN KEY (trajet_id) REFERENCES trajet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE trajet_user ADD CONSTRAINT FK_825A9176A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_reservation DROP FOREIGN KEY FK_8EA49409177B36E8');
        $this->addSql('ALTER TABLE reservation_reservation DROP FOREIGN KEY FK_8EA49409E9E6667');
        $this->addSql('ALTER TABLE trajet DROP FOREIGN KEY FK_2B5BA98C497832A6');
        $this->addSql('ALTER TABLE trajet DROP FOREIGN KEY FK_2B5BA98C34AC9A4B');
        $this->addSql('ALTER TABLE trajet DROP FOREIGN KEY FK_2B5BA98CF16F4AC6');
        $this->addSql('ALTER TABLE trajet_user DROP FOREIGN KEY FK_825A9176D12A823');
        $this->addSql('ALTER TABLE trajet_user DROP FOREIGN KEY FK_825A9176A76ED395');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE reservation_reservation');
        $this->addSql('DROP TABLE trajet');
        $this->addSql('DROP TABLE trajet_user');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE ville');
    }
}
