<?php

use Phpmig\Migration\Migration;

class CreateOrderDetails extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "
        CREATE TABLE " . TABLE_ORDER_DETAILS . " (
            `id` integer(11) NOT NULL AUTO_INCREMENT,
            `ordersId` varchar(50) NOT NULL,
            `productsId` integer(11) NOT NULL,
            `product_code` varchar(50) NOT NULL,
            `shop_product_code` varchar(50) NOT NULL,
            `name` varchar(50) NOT NULL,
            `price` integer NOT NULL,
            `quantity` integer NOT NULL,
            `jan_code` varchar(50) NOT NULL,
            `delete_flg` boolean NOT NULL DEFAULT false,
            `created_at` datetime DEFAULT CURRENT_TIMESTAMP(),
            `updated_at` datetime DEFAULT CURRENT_TIMESTAMP(),
            PRIMARY KEY (`id`),
            INDEX idx(`ordersId`), 
            FOREIGN KEY (`ordersId`) REFERENCES " . TABLE_ORDERS . "(`ordersId`)
             ON DELETE CASCADE
             ON UPDATE CASCADE,
            FOREIGN KEY (`productsId`) REFERENCES " . TABLE_PRODUCTS . "(`id`)
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
        DROP TABLE " . TABLE_ORDER_DETAILS . "
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
