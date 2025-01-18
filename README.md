# HTMX swap

Deze repo bevat een voorbeeld van hoe je HTMX kan gebruiken om 
een uit een full page response alleen een snippet te gebruiken om
een target te updaten.

Dit maakt gebruik van hx-select

De view is welcome.blade.php en de controller HelloController
# inline-form-htmx

```bash
git clone
composer install
npm install
npm run dev
php artisan migrate:fresh --seed
php artisan serve
```

### Login
User: 'test@example.com'  
Password 'password'

### With/without htmx
To try without htmx, comment out the htmx script in `test/show.blade.php`
```
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/htmx/2.0.4/htmx.min.js"></script>--}}
```
