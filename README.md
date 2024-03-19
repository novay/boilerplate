# Laravel Boilerplate

💡 This built for my personal use. **Tested on Laravel 10 & 11**.

## Installation

📖 The installation process is quite simple.

```bash
# Laravel 10
composer create-project laravel/laravel:^10.0 example-app
cd example-app
composer require novay/boilerplate
php artisan vendor:publish --provider="Novay\Boilerplate\BoilerplateServiceProvider" --tag="config"
php artisan boilerplate:install


# Laravel 11
laravel new example-app
cd example-app
composer require novay/boilerplate "1.0.56"
php artisan vendor:publish --provider="Novay\Boilerplate\BoilerplateServiceProvider" --tag="config"

# Additional
composer require kirschbaum-development/eloquent-power-joins "2.*"

php artisan boilerplate:install
```

Do not forget to migrate our default migration:

```bash
php artisan migrate
````

The `boilerplate:install` command will also build the frontend assets. Just like [regular Laravel applications](https://laravel.com/docs/10.x/vite#running-vite), you may run the Vite development server:

```bash
npm run dev
````

Additionally, you can follow this step:

```php
// app/Providers/AppServiceProvider.php
...
use ProtoneMedia\Splade\Facades\Splade;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    ...
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Splade::defaultToast(function ($toast) {
            $toast->autoDismiss(3);
        });
    }
    ...
}

// app/Http/Kernel.php (Laravel 10)
...
class Kernel extends HttpKernel
{
    ...
    protected $middlewareGroups = [
        'web' => [
            ...
            \App\Http\Middleware\LangMiddleware::class,
        ],
        ...
    ];
    ...
}

// app/Models/User.php 
...
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; # Laravel 10

use App\Traits\HasProfilePhoto;
use App\Traits\RandomIds;

class User extends Authenticatable // implements MustVerifyEmail
{
    use HasApiTokens; # Laravel 10
    use HasFactory, Notifiable;
    use HasProfilePhoto, RandomIds;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'plain',
        'address',
        'last_login_ip',
        'last_login_at'
    ];

    protected $hidden = [
        'password',
        'plain',
        'remember_token',
    ];

    # Laravel 10
    protected $casts = [
        'password' => 'hashed',
        'email_verified_at' => 'datetime',
        'deleted_at' => 'datetime',
        'last_login_at' => 'datetime',
    ];

    # Laravel 11
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'email_verified_at' => 'datetime',
            'deleted_at' => 'datetime',
            'last_login_at' => 'datetime',
        ];
    }
}
````

## Documentation

📖 Complete documentation for [Laravel Splade](https://splade.dev/docs/introducing-splade)

You can use this toolkit right away:
- [Preline](https://preline.co/docs/index.html) (Tailwind)
- [Iconify Design](https://icon-sets.iconify.design) (Icon)

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Security

If you discover any security related issues, please email novay@btekno.id instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
