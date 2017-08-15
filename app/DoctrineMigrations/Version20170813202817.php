<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170813202817 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE event_term DROP FOREIGN KEY FK_BAC4AB261150D567');
        $this->addSql('DROP INDEX IDX_BAC4AB261150D567 ON event_term');
        $this->addSql('ALTER TABLE event_term CHANGE attendee term_proposer INT DEFAULT NULL');
        $this->addSql('ALTER TABLE event_term ADD CONSTRAINT FK_BAC4AB26AED012A1 FOREIGN KEY (term_proposer) REFERENCES fos_user (id)');
        $this->addSql('CREATE INDEX IDX_BAC4AB26AED012A1 ON event_term (term_proposer)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE event_term DROP FOREIGN KEY FK_BAC4AB26AED012A1');
        $this->addSql('DROP INDEX IDX_BAC4AB26AED012A1 ON event_term');
        $this->addSql('ALTER TABLE event_term CHANGE term_proposer attendee INT DEFAULT NULL');
        $this->addSql('ALTER TABLE event_term ADD CONSTRAINT FK_BAC4AB261150D567 FOREIGN KEY (attendee) REFERENCES fos_user (id)');
        $this->addSql('CREATE INDEX IDX_BAC4AB261150D567 ON event_term (attendee)');
    }
}
