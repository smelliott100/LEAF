<?php


use Phinx\Migration\AbstractMigration;

class OrgChart05 extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $migrationContents = file_get_contents('../../LEAF_Nexus/db_upgrade/Update_OC_DB_2861-2908.sql');
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
    }
}
