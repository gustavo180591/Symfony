<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250114144840 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE entrada (id INT AUTO_INCREMENT NOT NULL, objeto_id INT DEFAULT NULL, fecha DATETIME NOT NULL, cantidad INT NOT NULL, INDEX IDX_C949A27476F5CD27 (objeto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salida (id INT AUTO_INCREMENT NOT NULL, objeto_id INT DEFAULT NULL, fecha DATETIME NOT NULL, cantidad INT NOT NULL, INDEX IDX_95F4C74876F5CD27 (objeto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entrada ADD CONSTRAINT FK_C949A27476F5CD27 FOREIGN KEY (objeto_id) REFERENCES objeto (id)');
        $this->addSql('ALTER TABLE salida ADD CONSTRAINT FK_95F4C74876F5CD27 FOREIGN KEY (objeto_id) REFERENCES objeto (id)');
        $this->addSql('ALTER TABLE objeto ADD total INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entrada DROP FOREIGN KEY FK_C949A27476F5CD27');
        $this->addSql('ALTER TABLE salida DROP FOREIGN KEY FK_95F4C74876F5CD27');
        $this->addSql('DROP TABLE entrada');
        $this->addSql('DROP TABLE salida');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE objeto DROP total');
    }
}
