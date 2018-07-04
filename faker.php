<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 25/06/2018
 * Time: 2:20 CH
 */
require_once 'vendor/autoload.php';

$faker = Faker\Factory::create();

$db = new PDO('mysql:host=localhost;dbname=northwind', 'root','test');

for ($i=0; $i < 25; $i++) {
    $db->query("
        INSERT INTO orders (employee_id, customer_id, order_date, shipped_date, shipper_id, ship_name, ship_address, ship_city, ship_state_province, ship_zip_postal_code, ship_country_region, shipping_fee, taxes, payment_type, paid_date, status_id) 
        VALUES ('{$faker->numberBetween($min = 1, $max = 9)}','{$faker->numberBetween($min = 1, $max = 29)}','2006-11-20','{$faker->date($format = 'Y-m-d H:i:s', $max = 'now')}','{$faker->numberBetween($min = 1, $max = 2)}','{$faker->name($gender = null|'male'|'female')}','{$faker->streetAddress}','$faker->city','{$faker->stateAbbr}','{$faker->postcode}','USA','{$faker->numberBetween($min = 10, $max = 1000)}','0','{$faker->creditCardType}','{$faker->date($format = 'Y-m-d H:i:s', $max = 'now')}','{$faker->numberBetween($min = 0, $max = 3)}')
    ");
}