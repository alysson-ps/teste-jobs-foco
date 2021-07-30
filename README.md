<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## How to configure the api

```sh
composer install
composer run env
php artisan key:generate --ansi
php artisan migrate
php artisan db:seed --class=TaxSeeder
```
## How to run the api

```sh
composer run start
```

## Ends Points

<span style="color:#75ba24">POST</span> Register products in the system

```
URL => http://localhost:8000/api/product/create
```

```json
{
  "name": "Arroz",
  "type": "A",
  "price": "3.60"
}
```

```
Response exemple
```

```json
{
  "name": "feijao",
  "type": "A",
  "price": "3.60",
  "updated_at": "2021-07-29T20:57:57.000000Z",
  "created_at": "2021-07-29T20:57:57.000000Z",
  "id": 3
}
```

<hr style="margin: 30px 0"></hr>

<span style="color:#75ba24">POST</span> Check product prices by quantity
```
URL => http://localhost:8000/api/product/query
```
```json
{
	"products":[
		{
			"name": "arroz",
			"quantity": 4
		},
		{
			"name": "feijao",
			"quantity": 3
		}
	]
}
```

```
Response exemple
```

```json
{
  "products": [
    {
      "product": "arroz",
      "priceTotal": "424.00",
      "taxTotal": "24.00"
    },
    {
      "product": "feijao",
      "priceTotal": "11.45",
      "taxTotal": "0.65"
    }
  ],
  "totalPrice": "435.45",
  "totalTax": "6.22"
}
```
