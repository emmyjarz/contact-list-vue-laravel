# Contact List

Web Application to maintain a list of contacts which integrates with the google map api in order to show the location of each contact.  The page allows for pagaination and the functions to, search, sort by first name, last name, email address, phone number and a popup modal to confirm before removing contact.

### Prerequisites
- [PHP](http://php.net/manual/en/install.php)
- [Laravel](https://laravel.com/docs/5.7)

### Installing
- Create a database locally
- Rename `.env.example` file to `.env`inside your project root and fill the database information.
  (windows wont let you do it, so you have to open your console cd your project root directory and run `mv .env.example .env` )
- Open the console and cd your project root directory
- Run `composer install` or ```php composer.phar install```
- Run `php artisan key:generate` 
- Run `php artisan migrate`
- Run `npm install`
- Run `php artisan serve`

##### You can now access your project at localhost:8000 

## If for some reason your project stop working do these:
- `composer install`
- `php artisan migrate`

## Built With
* [Vue.js](https://vuejs.org) - The frontend JavaScript framework
* [Laravel](https://laravel.com/docs/5.7) - The backend web framework
* [Bootstrap](https://getbootstrap.com/docs/4.4/getting-started/introduction/) - The styling framework used
* [SweetAlert2](https://sweetalert2.github.io/) - Library that give "alert" and "prompt" features better-looking versions

## Contributing
Bug reports and pull requests are welcome on GitHub at https://github.com/emmyjarz/contact-list-vue-laravel.