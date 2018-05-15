<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180515151241 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE reading (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, readingtype_id INT NOT NULL, val_bool TINYINT(1) DEFAULT NULL, val_decimal NUMERIC(12, 4) DEFAULT NULL, val_int INT DEFAULT NULL, val_string VARCHAR(255) DEFAULT NULL, INDEX IDX_C11AFC41A76ED395 (user_id), UNIQUE INDEX UNIQ_C11AFC41A1C12D7C (readingtype_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reading ADD CONSTRAINT FK_C11AFC41A76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE reading ADD CONSTRAINT FK_C11AFC41A1C12D7C FOREIGN KEY (readingtype_id) REFERENCES reading_type (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE reading');
    }
}
