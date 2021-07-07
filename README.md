![PHP](https://badgen.net/badge/PHP/v7.3/blue) ![Laravel](https://badgen.net/badge/Laravel/6.20.*/pink) ![Mysql](https://badgen.net/badge/Mysql/8.0.*/purple) ![Docker](https://badgen.net/badge/Docker/Supported/blue?icon=docker)

## Personal Finance

Personal Finance is a CMS App built with the beautiful PHP framework Laravel. It is an application for managing your personal or team/company income. I personally needed such type of software which can provide us with some more interesting features than a regular excel spreadsheet and this is why I made this. I thought it would be a good idea to share it and be in service to others as well.

This application will include the following features:
- Add/Change income sources
- Add/Change income records
- Add/Change expense records (later)
- Financal projections/analytics (later)
- Currency exchange rates (Being revised)
- *More to come*

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

## Contributing

Project is public and open to any suggestions by volunteers to participate and contribute.

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor[at]laravel.com. If you want to address any problems using the Personal Finance application, please send an e-mail to Martin Georgiev at geeorgiev[at]gmail.com. All security vulnerabilities or concerns will be promptly addressed.

## License

This project is open-sourced software licensed under the [GNU license](https://github.com/Mim0oo/personal_finance/blob/master/LICENSE).
