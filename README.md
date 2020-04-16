## Sample Adapter Design

We should implement an API to get the best price of a product.

We have 3 vendors.

`Amazon` (It has an API based on JSON)

`Ebay` (It has an API based on XML)

`Alibaba` (It has an API based on SOAP)

## Intstall

It doesn't have any dockerfile :(

1) `composer install`
2) `php artisan migrate`
3) `php artisan db:seed`

For update product Amazon:

`php artisan amazon:update`

For update product Ebay:

`php artisan Ebay:update`
