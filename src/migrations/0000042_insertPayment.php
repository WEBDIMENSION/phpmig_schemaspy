<?php

use Phpmig\Migration\Migration;

class insertPayment extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $faker = Faker\Factory::create(FAKER_LOCATE);
        $container = $this->getContainer();

        for ($i = 0; $i < count(ORDERS_PAYMENT); $i++) {
            $stmt = $container['db']->prepare(
                "insert into " . TABLE_PAYMENT . "
                        (
                            name,
                            cost,
                            memo
                        ) values (
                         '" . ORDERS_PAYMENT[$i]['name'] . "',
                         " . ORDERS_PAYMENT[$i]['cost'] . ",
                         '" . $faker->realText(50) . "'
                        );"
            );
            $stmt->execute([]);
        }
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "
        TRUNCATE TABLE " . TABLE_PAYMENT . "
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
