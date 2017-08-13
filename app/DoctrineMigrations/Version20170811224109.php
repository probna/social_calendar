<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170811224109 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE event_term ADD attendee INT DEFAULT NULL');
        $this->addSql('ALTER TABLE event_term ADD CONSTRAINT FK_BAC4AB261150D567 FOREIGN KEY (attendee) REFERENCES fos_user (id)');
        $this->addSql('CREATE INDEX IDX_BAC4AB261150D567 ON event_term (attendee)');
        $this->addSql('ALTER TABLE event ADD owner INT DEFAULT NULL');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7CF60E67C FOREIGN KEY (owner) REFERENCES fos_user (id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA7CF60E67C ON event (owner)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7CF60E67C');
        $this->addSql('DROP INDEX IDX_3BAE0AA7CF60E67C ON event');
        $this->addSql('ALTER TABLE event DROP owner');
        $this->addSql('ALTER TABLE event_term DROP FOREIGN KEY FK_BAC4AB261150D567');
        $this->addSql('DROP INDEX IDX_BAC4AB261150D567 ON event_term');
        $this->addSql('ALTER TABLE event_term DROP attendee');
    }
}
