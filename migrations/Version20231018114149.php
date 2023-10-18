<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231018114149 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, id_client_id INT DEFAULT NULL, id_bijoux_id INT DEFAULT NULL, date_debut_location DATE NOT NULL, date_fin_location DATE NOT NULL, INDEX IDX_5E9E89CB99DED506 (id_client_id), UNIQUE INDEX UNIQ_5E9E89CBBD0EFF1 (id_bijoux_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CB99DED506 FOREIGN KEY (id_client_id) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CBBD0EFF1 FOREIGN KEY (id_bijoux_id) REFERENCES bijou (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CB99DED506');
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CBBD0EFF1');
        $this->addSql('DROP TABLE location');
    }
}
