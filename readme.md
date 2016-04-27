# Laravel Followable

## Introduction

Laravel Followable provides a set of Traits and classes to kick start your microblogging site or your add social collaboration to your current project.

## License

Laravel Followable is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

## Official Documentation

To get started with Laravel Followable, add to your `composer.json` file as a dependency:

    composer require nuummite/laravel-followable

### Configuration

After installing the Socialite library, register the `Nuummite\Followable\Providers\FollowableServiceProvider` in your `config/app.php` configuration file:

```php
'providers' => [
    // Other service providers...

    Nuummite\Followable\Providers\FollowableServiceProvider::class,
],
```

Run the vendor publish artisan command to expose the needed migrations:

```
php artisan vendor:publish
```

Run the migrations using artisan command. This will create the needed tables in your database.
These are: followables and feed_messages

```
php artisan migrate
```

### Basic Usage

As a final step, you can use the traits FollowableTrait and FollowerTrait of this package in your User class in order to start coding your microblogging app.

It's as easy as thinking that a User can "follow" and can be "followed". So we add the needed functionallity to the User class.

You can also add these traits to any object. So if you'd like, for example, make a "Task" followable you can do it also! This is usefull when you want to add social collaboration to your application.