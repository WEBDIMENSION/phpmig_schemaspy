<?php

use Phpmig\Migration\Migration;

class insertOrderTotal extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $faker = Faker\Factory::create(FAKER_LOCATE);
        $container = $this->getContainer();

        $stmt = $container['db']->query("
        select o.ordersId, count(od.ordersId), sum(od.price * od.quantity) as sub_total, o.created_at, o.updated_at
        from
             orders o left join order_details od
            on o.ordersId = od.ordersId
        group by o.ordersId, od.ordersId, o.created_at, o.updated_at
            ");
        $order_details_array = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $container['db']->query("SELECT * FROM " . TABLE_SHIPPING);
        $shipping_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = $container['db']->query("SELECT * FROM " . TABLE_PAYMENT);
        $payment_array = $stmt->fetchAll(PDO::FETCH_ASSOC);


        for ($i = 0; $i < count($order_details_array); $i++) {
            $order_id = $order_details_array[$i]['ordersId'];
            $sub_total = $order_details_array[$i]['sub_total'];

            $total_value = 0;
            $total_value += $order_details_array[$i]['sub_total'];

            $shipping = $faker->randomElement($shipping_array);
            $shippingId = $shipping['id'];
            $shippingName = $shipping['name'];
            $shippingCost = $shipping['cost'];
            $total_value += $shipping['cost'];

            $payment = $faker->randomElement($payment_array);
            $paymentId = $payment['id'];
            $paymentName = $payment['name'];
            $paymentCost = $payment['cost'];
            $total_value += $payment['cost'];

            $created_at = $order_details_array[$i]['created_at'];
            $updated_at = $order_details_array[$i]['updated_at'];


            $stmt = $container['db']->prepare(
                "insert into " . TABLE_ORDER_TOTAL . "
                        (
                            ordersId,
                            sub_total,
                            shippingId,
                            shippingName,
                            shippingCost,
                            paymentID,
                            paymentName,
                            paymentCost,
                            total,
                            created_at,
                            updated_at
                        ) values (
                         '" . $order_id . "',
                         '" . $sub_total . "',
                         '" . $shippingId . "',
                         '" . $shippingName . "',
                         '" . $shippingCost . "',
                         '" . $paymentId . "',
                         '" . $paymentName . "',
                         '" . $paymentCost . "',
                         '" . $total_value . "',
                         '" . $created_at . "',
                         '" . $updated_at . "'
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
        TRUNCATE TABLE " . TABLE_ORDER_TOTAL . "
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
