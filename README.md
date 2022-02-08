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

## Start to use the system

before anything, please remember to seed data by running

```
php artisan db:seed
```

Then run the serve on port `8000` for supporting api request from the existing client Application.

```
php artisan serve --port=8000
```

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
    -   Product creation by applying discount for each product
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
-   improve the way we are retrieving the user account balance, because if the system receives more users, that algorithm can slow down the system
