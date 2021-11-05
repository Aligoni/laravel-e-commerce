
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
- The application is mobile responsive for every page.
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
Start the local development server.

```
php artisan serve
```
You can now access the website at [http://localhost:8000](http://localhost:8000)


## Project Usage
### NB. Some of the pages will be in landscape while other will be in portrait to show mobile responsiveness

- The user/customer is greeted at the landing page. At the top, there is a navigation bar to quickly access and navigate the website. The nav bar shows the authenticated user's name when they are logged in.

<img src="readme images/landing.png" width="49%" >
<img src="readme images/landing logged in.png" width="49%" >

- The mobile view uses a dropdown menu to show links to pages.

<img src="readme images/landing mobile.png" width="49%" >
<img src="readme images/mobile logged in.png" width="49%" >

- The user can either log in or create an account.

<img src="readme images/login page.png" width="49%" >
<img src="readme images/registration page.png" width="49%" >

- The user can view the available products in the products page

<img src="readme images/products page.png" width="100%" >

- The customer can select a specific product and view more details, but the cusotmer will have to be logged in before they can add a product to cart or place an order.

<img src="readme images/product details.png" width="49%" >
<img src="readme images/add product to cart.png" width="49%" >

- The customer can also add or reduce the quantity of a specific product in the cart.

<img src="readme images/cart mobile.png" width="49%" >
<img src="readme images/cart mobile add quantity.png" width="49%" >

- The customer can add different products of different quantities to cart. 
- After being satisfied with the selection, the customer can proceed to checkout to place an order.

<img src="readme images/cart.png" width="49%" >
<img src="readme images/cart reduce quantity.png" width="49%" >

- The user can preview their cart to confirm their selection and will have to provide an address for shipping(name and email can't be changed). The total price is also displayed.

<img src="readme images/checkout.png" width="49%" >
<img src="readme images/cart.png" width="49%" >

- After the customer confirms the order, they are redirected to the profile page. Here the user can see their details, as well as all of their past orders and order details.

<img src="readme images/order profile.png" width="49%" >
<img src="readme images/profile order details.png" width="49%" >

- Ofcourse there will be no products if they are not added by the admin. The admin page is located at [http://localhost:8000/admin](http://localhost:8000/admin). This requires authentication and the user is redirected to the login page. The user logs in using the default admin details provided when configuring the website.

- At the admin console, the user can either manage products, customers or orders.

<p align="center">
<img src="readme images/admin console.png" width="49%" >
</p>

- The products page is where the admin can add, edit or remove products from the website. This is reflected at the products page in the customer side.

<img src="readme images/admin add product.png" width="49%" >
<img src="readme images/admin added product.png" width="49%" >
<img src="readme images/admin edit product.png" width="49%" >
<img src="readme images/admin delete product.png" width="49%" >

- In the orders page, the admin can view all past orders. They can see the customer that ordered and view the details of the order.

<img src="readme images/admin orders.png" width="100%" >

<img src="readme images/admin order details first.png" width="49%" >
<img src="readme images/admin order details second.png" width="49%" >

- In the customers page, the admin can see the list of all registered users of the website, both admins and customers. By selecting a customer, the admin can view their details as well as their orders 

<img src="readme images/admin user.png" width="49%" >
<img src="readme images/admin users with order1.png" width="49%" >
<img src="readme images/admin users with order2.png" width="49%" >
<img src="readme images/admin users with order to admin role.png" width="49%" >

- !! If the admin wants to create another admin account, they must first create a normal customer account and then upgrade to admin account. The criteria for upgrade is shown above. 

<img src="readme images/admin users with no order 1.png" width="49%" >
<img src="readme images/admin users with no order 2.png" width="49%" >
<img src="readme images/admin users.png" width="99%" >


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
