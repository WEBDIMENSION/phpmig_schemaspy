<?php

use Phpmig\Migration\Migration;

class CreateOrders extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "
        CREATE TABLE " . TABLE_ORDERS . " (
            `id` integer(11) NOT NULL AUTO_INCREMENT,
            `ordersId` varchar(50) NOT NULL,
            `usersId` integer(11) NOT NULL,
            `firstname` varchar(190) NOT NULL,
            `lastname` varchar(190) NOT NULL,
            `firstname_kana` varchar(255) NOT NULL,
            `lastname_kana` varchar(255) NOT NULL,
            `email` varchar(255) NOT NULL,
            `phone_number` varchar(15) NOT NULL,
            `postcode` int(7) NOT NULL,
            `prefecture` varchar(10) NOT NULL,
            `address1` varchar(100) NOT NULL,
            `address2` varchar(100) NOT NULL,
            `user_ranksId` integer(11) NOT NULL,
            `staffsId` integer(11) NOT NULL,
            `delete_flg` boolean NOT NULL DEFAULT false,
            `created_at` datetime DEFAULT CURRENT_TIMESTAMP(),
            `updated_at` datetime DEFAULT CURRENT_TIMESTAMP(),
            PRIMARY KEY (`id`),
            INDEX idx(ordersId), 
            FOREIGN KEY (`usersId`) REFERENCES " . TABLE_USERS . "(`id`) 
             ON DELETE CASCADE
             ON UPDATE CASCADE,
            FOREIGN KEY (`staffsId`) REFERENCES " . TABLE_STAFFS . "(`id`) 
             ON DELETE CASCADE
             ON UPDATE CASCADE
            ) ENGINE=InnoDB;
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
        DROP TABLE " . TABLE_ORDERS . "
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
