<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230614115929 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE registration (id INT AUTO_INCREMENT NOT NULL, member_id INT NOT NULL, lesson_id INT NOT NULL, payment TINYINT(1) DEFAULT NULL, INDEX IDX_62A8A7A77597D3FE (member_id), INDEX IDX_62A8A7A7CDF80196 (lesson_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT FK_62A8A7A77597D3FE FOREIGN KEY (member_id) REFERENCES person (id)');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT FK_62A8A7A7CDF80196 FOREIGN KEY (lesson_id) REFERENCES lesson (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE registration DROP FOREIGN KEY FK_62A8A7A77597D3FE');
        $this->addSql('ALTER TABLE registration DROP FOREIGN KEY FK_62A8A7A7CDF80196');
        $this->addSql('DROP TABLE registration');
    }
}
