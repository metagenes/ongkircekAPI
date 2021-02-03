# REST API Documentation

This is Laravel REST API to consume Rajaongkir API using GuzzleHTTP. 

## Clone 

    git clone https://github.com/metagenes/ongkircekAPI


## Install

    composer install

## Setup .ENV

    make .env file based on .env.example. Fill database and midtrans credential.
    make sure to input RAJAONGKIR api-key to .env

## Run app

    php artisan serve


# REST API

The REST API to the app is described below.

### Request

## GET all provinces

### Request

`GET /api/provinces`

    http://localhost:8000/api/provinces

### Success Response

   {
    "success": true,
    "message": "Get All Provinces",
    "data": [
        {
            "province_id": "1",
            "province": "Bali"
        },
    ]
    }

## GET Cities Origin
### Request
`GET /api/cities`

    http://localhost:8000/api/cities/{$id}

### Success Response

   {
    "success": true,
    "message": "Get City By ID Provinces : 5",
    "data": [
        {
            "city_id": "39",
            "province_id": "5",
            "province": "DI Yogyakarta",
            "type": "Kabupaten",
            "city_name": "Bantul",
            "postal_code": "55715"
        },
    ];
   }


## GET Shipping Cost
### Request
`GET /api/cities`

    curl -i -H 'Accept: application/json' -d ' origin=501&destination=114&weight=900&courier=pos' http://localhost:8000/api/shippingcheck

### Success Response
{
    "success": true,
    "message": "Result Cost Ongkir",
    "data": [
        {
            "code": "pos",
            "name": "POS Indonesia (POS)",
            "costs": [
                {
                    "service": "Paket Kilat Khusus",
                    "description": "Paket Kilat Khusus",
                    "cost": [
                        {
                            "value": 48000,
                            "etd": "2 HARI",
                            "note": ""
                        }
                    ]
                }
            ]
        }
    ]
}
