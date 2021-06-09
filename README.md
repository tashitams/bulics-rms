## About Buli CS Result Management System (RMS)

BuliCS RMS is a web based app developed using Laravel to declare the result of students studying in Buli Central School, Zhemgang Bhutan in a secure way. The inspiration for this app has been BCSEA's on result system. 

## For demo [click here](http://result.codertashi.me/). 
Student Login: 
Username: 10001
Password: Select date as 1st Jan 2005


## Installation

Clone the repo locally:

```sh
git clone https://github.com/tashitams/bulics-rms.git
cd bulics-rms
```

Install PHP dependencies:

```sh
composer install
```

Install NPM dependencies:

```sh
npm install
```

Build assets:

```sh
npm run dev
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Create an empty database and update .env file
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Run database migrations:

```sh
php artisan migrate:fresh
```

Run the dev server (the output will give the address):

```sh
php artisan serve
```
