<?php

use Phpmig\Migration\Migration;

class insertShipping extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $faker = Faker\Factory::create(FAKER_LOCATE);

        $container = $this->getContainer();


        for ($i = 0; $i < count(ORDERS_SHIPPING); $i++) {
            $stmt = $container['db']->prepare(
                "insert into " . TABLE_SHIPPING . "
                        (
                            name,
                            cost,
                            memo
                        ) values (
                         '" . ORDERS_SHIPPING[$i]['name'] . "',
                         " . ORDERS_SHIPPING[$i]['cost'] . ",
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
        TRUNCATE TABLE " . TABLE_SHIPPING . "
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
