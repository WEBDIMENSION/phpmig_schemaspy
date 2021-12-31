<?php

// faker
const FAKER_LOCATE = 'ja_JP';
const STAFF_ROLES_ARRAY = ['administrator', 'general', 'external_staff'];

// staff roles
const TABLE_STAFF_ROLES = 'staff_roles';

// staffs
const TABLE_STAFFS = 'staffs';
const STAFFS_ROWS_COUNT = '10';


//  user_rans
const TABLE_USER_RANKS = 'user_ranks';
const USERS_RANKS_ARRAY = ['premium', 'gold', 'silver', 'bronze', 'basic'];
const USERS_BIRTHDAY_FROM = '-80 years';
const USERS_BIRTHDAY_TO = '-20 years';
const USERS_CREATED_FROM = '-5 years';
const USERS_CREATED_TO = '-1 years';

// users
const TABLE_USERS = 'users';
const USERS_DATA_ROWS_COUNT = 100;
const USERS_DELETED_ROWS_COUNT = 10;

// login_history
const TABLE_LOGIN_HISTORY = 'login_history';
const LOGIN_HISTORY_DATA_ROWS_COUNT = 200;

// products
const TABLE_PRODUCTS = 'products';
const PRODUCTS_DATA_ROWS_COUNT = 300;
const PRODUCTS_DELETED_ROWS_COUNT = 10;
const PRODUCTS_PRICE_MIN = 1000;
const PRODUCTS_PRICE_MAX = 9000;
const PRODUCTS_STOCK_MIN = 0;
const PRODUCTS_STOCK_MAX = 100;

// orders
const TABLE_ORDERS = 'orders';
const ORDERS_DATA_ROWS_COUNT = 300;

// orders detail
const TABLE_ORDER_DETAILS = 'order_details';
const ORDER_DETAILS_PRODUCT_ROWS_MIN_COUNT = 1;
const ORDER_DETAILS_PRODUCT_ROWS_MAX_COUNT = 5;

const ORDER_DETAILS_QUANTITY_MIN_COUNT = 1;
const ORDER_DETAILS_QUANTITY_MAX_COUNT = 3;

// orders total
const TABLE_ORDER_TOTAL = 'order_total';

// product reviews
const TABLE_PRODUCT_REVIEWS = 'product_reviews';
const PRODUCTS_REVIEW_ROWS_COUNT = 50;

// shipping
const TABLE_SHIPPING = 'shipping';
const ORDERS_SHIPPING = [
    ['name' => 'ヤマト運輸', 'cost' => 600],
    ['name' => '佐川急便', 'cost' => 500],
    ['name' => 'ゆうパック', 'cost' => 400]
];

// payment
const TABLE_PAYMENT = 'payment';
const ORDERS_PAYMENT = [
    ['name' => 'クレジットカード', 'cost' => 0],
    ['name' => 'コンビニ', 'cost' => 300],
    ['name' => '銀行振込', 'cost' => 100]
];
