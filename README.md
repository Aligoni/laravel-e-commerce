
<p align="center">
<img src="readme images/app-logo.png" width="400">
</p>

<p align="center">
Your #1 shopping website!
</p>

## About

K-Clothing is an online shopping mall where customers can order products at an affordable price. The customer must be registered before they can buy a product. An admin user can add or delete products from the admin section. The admin can also view all registered users and their orders. 

## Description and Features
- The application is built with Laravel framework. 
- It uses user authentication with different user roles, admin and customer. 
- Some parts of the website can be viewed without logging in but others require authentication. 
- Users that register will automatically be given the customer role. 
- A default admin is created the first time application is installed. 
- An admin can upgrade a customer to an admin if it satisfies some requirements. 
- An admin can add, edit and delete products.
- An admin can also view all orders and customers registered.
- Customers can view added products and add them to their cart.
- Customers can add or reduce quantity of products in cart.
- They can then checkout and place an order of the products in their cart.
- They can view their profile to see past orders.

## Technical Features
- Website uses multiple authentication middlewares for both customer and admin.
- Database uses multiple tables to store user and admin information.
- There are multiple foreign key constraints on users, products, orders and order_products tables.
- Website uses sessions to display information and errors.
- Website uses tailwind css for majority of the CSS styling.
- Website makes use of Components for faster development of common elements.
- Website uses laravel breeze template for initial basic authentication.
- Website uses table linking between users table and other tables.
- Website uses table relations for faster quering of related tables.
- Website makes use of all CRUD Operations.

## Project Installation
Please check the official laravel installation guide for server requirements before you start.

Clone the repository and cd to the folder.

Install dependencies using [Composer](https://getcomposer.org/)

```
composer install
```
Install javascript dependencies using [npm](https://www.npmjs.com/)

```
npm install
```
Generate the necessary javascript files 

```
npm run dev
```
Copy the example env file and make the required configuration changes in the .env file

```
cp .env.example .env
```

Generate a new application key

```
php artisan key:generate
```

Run the databse migration (Set the database and admin configurations before migration)

```
php artisan migrate
```
Start the local development serve.

```
php artisan serve
```
You can now access the website at [http://localhost:8000](http://localhost:8000)


## Project Usage
The user is greeted at the landing page.

<img src="readme images/landing.png" width="100%" >

From here the user can view the available products in the products page

<img src="readme images/no products.png" width="100%" >



Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[CMS Max](https://www.cmsmax.com/)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

Installed Tailwind css
npx tailwindcss init
editing tailwind config file with
purge: [
     './resources/**/*.blade.php',
     './resources/**/*.js',
     './resources/**/*.vue',
   ]

adding require("tailwindcss") to webpack
adding 
@tailwind base;
@tailwind components;
@tailwind utilities;
to resources/css/app.css
You can find instructions in https://tailwindcss.com/docs/guides/laravel

Installed laravel breeze using
composer require laravel/breeze --dev
php artisan breeze:install
yarn install
npm run dev
