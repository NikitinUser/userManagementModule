# userManagementModule
Laravel 10<br><br>

Установка:<br>

<ul>
<li>1) composer require nikitinuser/user-management-module:dev-master</li>

<li>
    2)
    <ul>
        <li>
            2.1) app.php: <br>
                'providers' => ServiceProvider::defaultProviders()->merge([<br>
                    ...<br>
                    NikitinUser\UserManagementModule\UserManagementModuleProvider::class,<br>
                ])->toArray(),<br>
        </li>
        <li>
            2.2) App\Http\Kernel.php <br>
                protected $middlewareAliases = [<br>
                    ...<br>
                    'role' => \NikitinUser\userManagementModule\lib\Middleware\RoleMiddleware::class,<br>
                ];<br>
        </li>
        <li>
            2.3) php artisan vendor:publish --provider="NikitinUser\UserManagementModule\UserManagementModuleProvider"
        </li>
    </ul>
</li>

<li>
    3) php artisan migrate --path=./vendor/nikitinuser/user-management-module/lib/database/migrations
</li>

<li>
    4) php artisan db:seed --class="NikitinUser\\userManagementModule\\lib\\database\\seeders\\RolesSeed"
</li>
</ul>
