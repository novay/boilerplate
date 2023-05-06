# Laravel Boilerplate

💡 This is a fork of the [Laravel Breeze for Laravel Splade](https://github.com/protonemedia/laravel-splade-breeze) implementation. And built for my personal use.

## Installation

📖 The installation process is quite simple.

```bash
laravel new example-app

cd example-app

composer require novay/boilerplate

php artisan breeze:install


```

Do not forget to migrate our default migration:

```bash
php artisan migrate
````

The `breeze:install` command will also build the frontend assets. Just like [regular Laravel applications](https://laravel.com/docs/10.x/vite#running-vite), you may run the Vite development server:

```bash
npm run dev
````

## Documentation

📖 Complete documentation for [Laravel Splade](https://splade.dev/docs/introducing-splade)

You can use both for frontend toolkit:
- [Basic Bootstrap](https://getbootstrap.com/docs/5.3/getting-started/introduction/)
- [Preline](https://preline.co/docs/index.html) (Tailwind)

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Security

If you discover any security related issues, please email novay@btekno.id instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
