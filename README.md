# Zatech Ecommerce Client side

## Installation

Clone the repository from github

```
    git clone https://github.com/kakaprodo/zatech-ecommerce.git
```

Then you can install the project dependencies by running

```
composer install
```

## Setup the .env file

Create the `.env` file in the root folder, then configure it based on the `.env.example` file.
After taking all the keys from `.env.example` to `.env` file, Here are some important variables that you `must` configure:

```
QUEUE_CONNECTION=database

MAIL_MAILER=
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS=
```

## Start using the system

Before anything, please remember to seed data into database, so that you can have the access to the admin dashboard

```
php artisan migrate --seed
```

Then run the server

```
php artisan serve
```

`Note`: 
In the `.env`, the APP_URL should be set depending on your local config (e.g. valet, sail etc.)
`APP_URL=http://localhost:port_number_here`  >> or your domain (e.g. `APP_URL=http://domain.com`).

## Mailing

As we are supporting queue for sending emails after a user has purchased a product, let's watch the tasks that will be proccessed in laravel queue by running the bellow command:

```
php artisan queu:work
```

`Note`: Please remember to set in the .env file the `QUEUE_CONNECTION` to `database`.

### Login

Congratulation Everything is setup, now for accessing to the admin dashboard, you can use `admin@gmail.com` as username and `password` as user password. Enjoy

## Implementation process

In case you may be interested in how we have implemented this system, here are the steps we have followed:

### Foundation or setup

-   Install laraval
-   Install Laravel breeze package for backend authentication
-   Install Laravel sanctum package for Api authentication
-   Implement Login and Registration with the help of Laravel breeze

### Implementation

-   (Admin side) - Product management(We could implement the entire CRUD, but we will start with the product creation first other can come after)
    -   Seed discount settings
    -   Product creation
    -   Display created products
-   (Backend)Provide APIs

    -   Implement Api for registration
    -   implement Api for login
    -   Implement Api to topup the user account balance
    -   Display user account balance
    -   Implement api to fetch transactions list
    -   Implement Api for products
        -   Api to Fetch Products list
        -   Api to Purchase a product

-   (Client Side)Hookup APIs
    -   Setup a React native application
    -   Design registration page and hookup to its Api
    -   Design login page and hookup to its Api
    -   Design Products list page and hookup to its Api
    -   Design Product Purchase Page and hookup to its Api
    -   Design Topup page and hookup to its Api
    -   Design Transaction list page and hookup to its Api
-   (Backend) remove money from account balance when customer purchase
-   Support quantity on product
-   (Client side) - handle error
-   Manage User Permission with Laratrust Package
-   (Admin side)Display Purchases
-   Notify Admin via Email when a product is purchased
-   Add images to product
-   Review Discount logic
-   Seed data into Db to facilitate people who want to test
-   Document the project in Readme file

Note: we could not cover everything that are important but in case we get that opportunity, we could improve:

-   The user experience
-   responsiveness on client side
-   add more security for the user access token on client side
-   improve the way we are retrieving the user account balance, because the more transactions the user makes, the heavier this algorithm becomes
