<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230612101740 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE person_lesson DROP FOREIGN KEY FK_64D14445217BBB47');
        $this->addSql('ALTER TABLE person_lesson DROP FOREIGN KEY FK_64D14445CDF80196');
        $this->addSql('DROP TABLE person_lesson');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE person_lesson (id INT AUTO_INCREMENT NOT NULL, person_id INT NOT NULL, lesson_id INT NOT NULL, INDEX IDX_64D14445217BBB47 (person_id), INDEX IDX_64D14445CDF80196 (lesson_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE person_lesson ADD CONSTRAINT FK_64D14445217BBB47 FOREIGN KEY (person_id) REFERENCES person (id)');
        $this->addSql('ALTER TABLE person_lesson ADD CONSTRAINT FK_64D14445CDF80196 FOREIGN KEY (lesson_id) REFERENCES lesson (id)');
    }
}
