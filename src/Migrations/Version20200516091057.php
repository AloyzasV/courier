<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200516091057 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('INSERT INTO milk_type (name) VALUES ("Organic")');
        $this->addSql('INSERT INTO milk_type (name) VALUES ("Low-fat")');
        $this->addSql('INSERT INTO milk_type (name) VALUES ("Whole")');

        $this->addSql('INSERT INTO cup_size (name) VALUES ("S")');
        $this->addSql('INSERT INTO cup_size (name) VALUES ("M")');
        $this->addSql('INSERT INTO cup_size (name) VALUES ("L")');
    }

    public function down(Schema $schema) : void
    {

    }
}
