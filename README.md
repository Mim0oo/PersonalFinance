## About Personal Finance

Personal Finance is a CMS App built with the beatiful PHP framework Laravel 5.4. It is an application for managing your personal or team/company income. I personally needed such type of software which can provide us with some more interesting features than a regular excel spreadsheet and this is why I made this. I thought it would be a good idea to share it and be in service to others as well.

This application will include the following features:
- Add/Change income sources
- Add/Change income records
- Add/Change expense records (in development)
- Financal analytics (in development), should provide estimated earnings over time.
- Currency exchange rates (partially done)
- *More to come*

## INSTALLATION

Please, use the below information to setup Personal Finance:

* Create a new Mysql database with utf8 character encoding.

* Clone the repository:
```sh
git clone https://github.com/Mim0oo/personal_finance.git
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

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. If you want to address any problems using the Personal Finance application, please send an e-mail to Martin Georgiev at geeorgiev@gmail.com. All security vulnerabilities or concerns will be promptly addressed.

## License

This project is open-sourced software licensed under the [GNU license](https://github.com/Mim0oo/personal_finance/blob/master/LICENSE).