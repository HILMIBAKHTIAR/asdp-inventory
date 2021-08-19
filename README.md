Cara Install
<br>
#minimum php : 7.2
<br>
#disarankan php : 8.0
1. git Clone https://github.com/HILMIBAKHTIAR/asdp-inventory.git
2. composer install
3. copy file .env.example menjadi .env dan sesuaikan Db
4. php artisan migrate
5. php artisan key:generate
6. composer dump-autoload
7. php artisan db:seed --class=PermissionTableSeeder
8. php artisan db:seed --class=CreateAdminSeeder
