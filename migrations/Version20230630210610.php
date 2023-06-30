<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230630210610 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE case_plateau (id INT AUTO_INCREMENT NOT NULL, plateau_id INT NOT NULL, nom VARCHAR(255) NOT NULL, position INT DEFAULT NULL, INDEX IDX_F30B8AD7927847DB (plateau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plateau (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE case_plateau ADD CONSTRAINT FK_F30B8AD7927847DB FOREIGN KEY (plateau_id) REFERENCES plateau (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE case_plateau DROP FOREIGN KEY FK_F30B8AD7927847DB');
        $this->addSql('DROP TABLE case_plateau');
        $this->addSql('DROP TABLE plateau');
    }
}
