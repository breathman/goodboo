<?php

namespace Goodboo\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170517115513 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $message = $schema->createTable('message');
        $message->addColumn('id',           Type::INTEGER,  ['autoincrement' => true]);
        $message->addColumn('text_message', Type::STRING,   ['notnull' => false]);
        $message->addColumn('user_name',    Type::STRING,   ['length' => 32]);
        $message->addColumn('user_email',   Type::STRING,   ['length' => 32, 'notnull' => false]);
        $message->addColumn('user_phone',   Type::STRING,   ['length' => 32, 'notnull' => false]);
        $message->addColumn('service',      Type::INTEGER,  ['notnull' => false]);
        $message->setPrimaryKey(['id']);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $schema->dropTable('message');
    }
}
