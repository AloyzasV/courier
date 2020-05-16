<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200516085914 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE coffee_order (id INT AUTO_INCREMENT NOT NULL, milk_type_id INT DEFAULT NULL, cup_size_id INT NOT NULL, milk TINYINT(1) DEFAULT \'0\' NOT NULL, location VARCHAR(255) NOT NULL, INDEX IDX_9BE3854A277A4A34 (milk_type_id), INDEX IDX_9BE3854A1A955AEF (cup_size_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE milk_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cup_size (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE coffee_order ADD CONSTRAINT FK_9BE3854A277A4A34 FOREIGN KEY (milk_type_id) REFERENCES milk_type (id)');
        $this->addSql('ALTER TABLE coffee_order ADD CONSTRAINT FK_9BE3854A1A955AEF FOREIGN KEY (cup_size_id) REFERENCES cup_size (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE coffee_order DROP FOREIGN KEY FK_9BE3854A277A4A34');
        $this->addSql('ALTER TABLE coffee_order DROP FOREIGN KEY FK_9BE3854A1A955AEF');
        $this->addSql('DROP TABLE coffee_order');
        $this->addSql('DROP TABLE milk_type');
        $this->addSql('DROP TABLE cup_size');
    }
}
