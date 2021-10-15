# userManagementModule
module for management users in app <br><br>

composer require nikitinuser/user-management-module <br><br>

Прописать: <br>
NikitinUser\UserManagementModule\UserManagementModuleProvider::class     в файл app.php <br><br>

php artisan migrate --path=./vendor/nikitinuser/user-management-module/lib/database/migrations

скопировать файл views/sidebar и подставить в свой сайдбар по желанию
