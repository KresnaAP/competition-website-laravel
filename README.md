# How To Use
## Instruction :
1. Install `laravel/ui` package

    ```sh
    $ composer require laravel/ui
    ```
2. Run
    ```sh
    $ composer dump-autoload
    ```
3. Create a database named `competition` in your `SQL` and to create basic users table, run
    ```sh
    $ php artisan migrate --seed
    ``` 
4. Create storage symlink to public, run 
    ```sh
    $ php artisan storage:link
    ``` 
5. To view, run 
    ```sh
    $ php artisan serve
    ``` 
