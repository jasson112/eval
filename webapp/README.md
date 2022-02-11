#CODE REVIEW
* No dev container nor docker or instructions of how I can install the project
* Lack of README file
* no key specified
* Documentation about .env file has to be defined and which variables should we need --
* On the table `contact` migration fix:
    * The `team_id` column has wrong integer value, it has to be changed as this `$table->integer('team_id')->unsigned()` instead of `$table->integer('team_id')`
    * The `name` column has wrong collation value, it has to be changed as this `$table->string('name')->nullable();` instead of `$table->string('name')->collation('utf8mb4_unicode_ci')->nullable();`
    * The `phone` column has wrong nullable value, it has to be changed as this `$table->string('phone')->nullable()` instead of `$table->string('phone')->nullable(false);`
    *
* On the table `custom_attributes` migration fix:
    * The `contact_id` column has wrong integer value, it has to be changed as this `$table->unsignedBigInteger('contact_id')` instead of `$table->unsignedBigInteger('contact_id')`
    * The `key` column has wrong integer value, it has to be changed as this `$table->string('key');` instead of `$table->string('key')->collation('utf8mb4_unicode_ci')->nullable(false);`
    * The `value` column has wrong integer value, it has to be changed as this `$table->string('value');` instead of `$table->string('value')->collation('utf8mb4_unicode_ci')->nullable(false);`
* On the `app.js` axios is wrong configure you have to remove `Vue.use(axios)` and add `Vue.prototype.axios = axios;`
* Added axios on `package.json`
* For `app/Http/Controllers/ContactController.php` this should be refactored liked this because it has an extra for columns, the function create over the Contact model should be inserted because you are attempting to insert multiple columns
    * ```
      public function store(ContactRequest $request)
      {
          $parameters = $request->validated();

          $contacts = [];

          foreach ($parameters['contacts'] as $keyContact => $contact) {
              foreach ($parameters['columns'] as $keyColumn => $column) {
                  $contacts[$keyContact][$column] = $contact[$keyColumn];
              }
          }
          Contact::insert($contacts);

          return response()->json([
              'success' => true
          ]);
      } 
      ```
* Refactoring on `web.php` over the middleware group you are calling this route for importing the CSV `Route::get('/import', 'ContactRequest@store');` But the Contact request class didn't exist sou you are wrong calling you should use this and the method was wrongly set it should be a post request `Route::post('/import', 'ContactController@store')`
* on the `resources/js/components/Home/HomeComponent.vue` over `line 131` you have the columns start at index 1, but you are not taken the column 0 you should correct that like this to take all columns:
```
for (let j = 0; j < columns.length; j++) {
    jsObj[`column-${j+1}`] = columns[j];
}
```
* Lack of CSV example:
```
100,Lila,53957,Lila@yopmail.com,463
101,Collen,43027,Collen@yopmail.com,903
102,Norine,12357,Norine@yopmail.com,861
103,Iseabal,49851,Iseabal@yopmail.com,516
104,Sandie,82316,Sandie@yopmail.com,935
105,Siana,1946,Siana@yopmail.com,207
```

      
-------------------

#INSTALLATION README

Use env.example changing their name to `.env` and replacing the variables as you wish

for the database you can use this example:
```
DB_CONNECTION=pgsql
DB_HOST=database
DB_PORT=5432
DB_DATABASE=app
DB_USERNAME=symfony
DB_PASSWORD=ChangeMe
```
if you are running the dev container use this exactly as well

then run `php artisan migrate:install` to create the migration database

install the default schema: `php artisan migrate:fresh`

fill the dummy data with: `php artisan db:seed`

you can use this data in order to login in the platform:
* `email -> test@voxie.com`
* `password -> admin123`

You can use this CSV as an example:
```
100,Lila,53957,Lila@yopmail.com,463
101,Collen,43027,Collen@yopmail.com,903
102,Norine,12357,Norine@yopmail.com,861
103,Iseabal,49851,Iseabal@yopmail.com,516
104,Sandie,82316,Sandie@yopmail.com,935
105,Siana,1946,Siana@yopmail.com,207
```
