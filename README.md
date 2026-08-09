# <p align="center">Personal Finance</p>
<p align="center">
Version 1.2
</p>
<p align="center">
<a href="README.md"><img src="https://badgen.net/badge/PHP/v8.4/blue" alt="PHP v8.4"></a>
<a href="README.md"><img src="https://badgen.net/badge/Laravel/13.8.*/pink" alt="Laravel v13.8.*"></a>
<a href="README.md"><img src="https://badgen.net/static/Bootstrap/5.3/purple" alt="Laravel v13.8.*"></a>
<a href="README.md"><img src="https://badgen.net/badge/MySQL/8.4.*/purple" alt="Mysql v8.4.*"></a>
<a href="README.md"><img src="https://badgen.net/badge/Docker/Supported/blue?icon=docker" alt="Docker"></a>
</p>

Personal Finance is a Laravel-powered CMS application designed to make managing personal, team, and company finances simpler and more insightful.

The project was created out of a personal need for a more capable alternative to traditional spreadsheets. While Excel and similar tools are useful for basic financial tracking, I wanted something purpose-built that could provide a cleaner experience, structured data management, and room for more advanced financial insights. What started as a personal project is now being developed with the goal of making it useful to others as well.

## Features

The application is actively evolving, with the following features planned or in development:
- Income Sources — Add and manage multiple income sources
- Income Records — Create, update, and track income transactions
- Expense Tracking — Manage and categorize expenses (planned)
- Financial Analytics & Projections — Gain insights into financial trends and future projections (planned)
- Currency Exchange Rates — Track and work with multiple currencies (under revision)
- More to come — Additional features and improvements are continuously being considered

## INSTALLATION

Please, use the below information to setup Personal Finance:

* Create a new Mysql database with utf8 character encoding.

* Clone the repository:
```sh
git clone https://github.com/Mim0oo/PersonalFinance.git
```
* Configure your **.env** file for your new database.

* Packages are managed by Composer, therefore it needs to be installed if not already and then perform the following commands:
```sh
$ composer install
$ php artisan migrate
$ php artisan cache:clear
```

* make sure you have your virtual host set with mod **Rewrite** on and **AllowOverride All**.

## Front-end configure and build example [TODO]
```sh
mkdir /.npm && chown -R 1000:0 "/.npm" && mkdir /.nvm

curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.1/install.sh | bash
    [ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh" \
    [ -s "$NVM_DIR/bash_completion" ] && \. "$NVM_DIR/bash_completion" && \
    nvm install node && nvm install v16 && nvm use v16

npm install && npm run build
```

## Contributing

Project is public and open to any suggestions by volunteers to participate and contribute.

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor[at]laravel.com. If you want to address any problems using the Personal Finance application, please send me a message or a PR. All security vulnerabilities or concerns will be promptly addressed.

## License

This project is open-sourced software licensed under the [GNU license](https://github.com/Mim0oo/personal_finance/blob/master/LICENSE).
