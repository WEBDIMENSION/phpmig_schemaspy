<?php

use Phpmig\Migration\Migration;

class CreateOrderTotal extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "
        CREATE TABLE " . TABLE_ORDER_TOTAL . " (
            `id` integer(11) NOT NULL AUTO_INCREMENT,
            `ordersId` varchar(50) NOT NULL,
            `sub_total` integer(10) NOT NULL,
            `shippingId` integer(11) NOT NULL,
            `shippingName` varchar(50) NOT NULL,
            `shippingCost` integer(11) NOT NULL,
            `paymentId` integer(11) NOT NULL,
            `paymentName` varchar(50) NOT NULL,
            `paymentCost` integer(11) NOT NULL,
            `total` integer(10) NOT NULL,
            `delete_flg` boolean NOT NULL DEFAULT false,
            `created_at` datetime DEFAULT CURRENT_TIMESTAMP(),
            `updated_at` datetime DEFAULT CURRENT_TIMESTAMP(),
            PRIMARY KEY (`id`),
            FOREIGN KEY (`ordersId`) REFERENCES " . TABLE_ORDER_DETAILS . "(`ordersId`)
             ON DELETE CASCADE
             ON UPDATE CASCADE,
            FOREIGN KEY (`shippingId`) REFERENCES " . TABLE_SHIPPING . "(`id`),
            FOREIGN KEY (`paymentId`) REFERENCES " . TABLE_PAYMENT . "(`id`)
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
        DROP TABLE " . TABLE_ORDER_TOTAL . "
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
