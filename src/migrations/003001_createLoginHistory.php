<?php

use Phpmig\Migration\Migration;

class CreateLoginHistory extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "
        CREATE TABLE " . TABLE_LOGIN_HISTORY . "(
            `id` integer(11) NOT NULL AUTO_INCREMENT,
            `usersId` integer(11) NOT NULL,
            `date` datetime DEFAULT CURRENT_TIMESTAMP(),
            `ua` varchar(255) NOT NULL,
            `ipv4` varchar(15) NOT NULL,
            `delete_flg` boolean NOT NULL DEFAULT false,
            `created_at` datetime DEFAULT CURRENT_TIMESTAMP(),
            `updated_at` datetime DEFAULT CURRENT_TIMESTAMP(),
            PRIMARY KEY (`id`),
            FOREIGN KEY (`usersId`) REFERENCES " . TABLE_USERS . "(`id`) 
             ON DELETE CASCADE
             ON UPDATE CASCADE
            ) ENGINE = InnoDB;
            ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "
        DROP TABLE " . TABLE_LOGIN_HISTORY . "
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
