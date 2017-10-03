<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170816171340 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE term_voters (event_term_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_EAC9937C8B7B9C53 (event_term_id), INDEX IDX_EAC9937CA76ED395 (user_id), PRIMARY KEY(event_term_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE term_voters ADD CONSTRAINT FK_EAC9937C8B7B9C53 FOREIGN KEY (event_term_id) REFERENCES event_term (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE term_voters ADD CONSTRAINT FK_EAC9937CA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE term_voters');
    }
}
