<?php

use App\Models\Category;
use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => false,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'search_path' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            // 'encrypt' => env('DB_ENCRYPT', 'yes'),
            // 'trust_server_certificate' => env('DB_TRUST_SERVER_CERTIFICATE', 'false'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],
    "categories" => [
        [
            'name' => 'Panneaux',
            'image' => asset('storage/categories/panneau.jfif')
        ], 

        [
            'name' => 'Ampoule',
            'image' => asset('storage/categories/ampoule.jfif')
        ],

        [
            'name' => 'Batterie',
            'image' => asset('storage/categories/batterie.jfif')
        ],

        [
            'name' => 'Projecteur',
            'image' => asset('storage/categories/projecteur.jfif')
        ],

        [
            'name' => 'Dijoncteur',
            'image' => asset('storage/categories/dij-4-pole.jfif')
        ],
    ],
    "products" => [
        /*start panneaux*/
        [
            'name'=> 'Panneaux de 10w',
            'image' => asset('storage/products/panneau10w.jfif'),
            'description'=> "Panneau solaire de 10w, pour l'éclairage. ",
            'information'=> 'Ce type de panneau vous offre la possibilité....',
            'quantity'=> 1000,
            'price'=> 20000,
            'weight'=> 12.35,
            'category_id'=> Category::where('name', '=', 'Panneaux de 10w')->first()->id,
        ],

        [
            'name'=> 'Panneaux de 50w',
            'image' => asset('storage/products/panneau50w.jfif'),
            'description'=> "Panneau solaire de 50w, pour l'éclairage. ",
            'information'=> 'Ce type de panneau vous offre la possibilité....',
            'quantity'=> 1500,
            'price'=> 4512,
            'weight'=> 0.52,
            'category_id'=> Category::where('name', '=', 'Panneaux de 50w')->first()->id,
        ],[
            'name'=> 'Panneaux de 80w',
            'image' => asset('storage/products/panneau80w.jfif'),
            'description'=> "Panneau solaire de 80w, pour l'éclairage. ",
            'information'=> 'Ce type de panneau vous offre la possibilité....',
            'quantity'=> 30000,
            'price'=> 15266,
            'weight'=> 0.5,
            'category_id'=> Category::where('name', '=', 'Panneaux de 80w')->first()->id,
        ],[
            'name'=> 'Panneaux de 100w',
            'image' => asset('storage/products/panneau100w.jfif'),
            'description'=> "Panneau solaire de 100w, pour l'éclairage. ",
            'information'=> 'Ce type de panneau vous offre la possibilité....',
            'quantity'=> 416518,
            'price'=> 6499,
            'weight'=> 0.80,
            'category_id'=> Category::where('name', '=', 'Panneaux de 100w')->first()->id,
        ],

        /*end panneau*/

        /*start Ampoule*/
        [
            'name'=> 'Ampoule Led 3w',
            'image' => asset('storage/products/led-3.jpg'),
            'description'=> "Ampoule doter de forte éclairage ",
            'information'=> 'La marque LED est une marque connu pour sa forte...',
            'quantity'=> 78548,
            'price'=> 7421514,
            'weight'=> 0.5,
            'category_id'=> Category::where('name', '=', 'ampoule')->first()->id,
        ],
       
        [
            'name'=> 'Ampoule Led 5w',
            'image' => asset('storage/products/led-5.jpg'),
            'description'=> "Ampoule doter de forte éclairage ",
            'information'=> 'La marque LED est une marque connu pour sa forte...',
            'quantity'=> 78548,
            'price'=> 7421514,
            'weight'=> 0.5,
            'category_id'=> Category::where('name', '=', 'ampoule')->first()->id,
        ],

        [
            'name'=> 'Spot led à multiple couleur',
            'image' => asset('storage/products/spot-led-couleur.jfif'),
            'description'=> "Ampoule doter de forte éclairage ",
            'information'=> 'La marque LED est une marque connu pour sa forte...',
            'quantity'=> 78548,
            'price'=> 7421514,
            'weight'=> 0.5,
            'category_id'=> Category::where('name', '=', 'ampoule')->first()->id,
        ],
       
        [
            'name'=> 'Spot led simple',
            'image' => asset('storage/products/spot-led.jfif'),
            'description'=> "Les Spots est.... ",
            'information'=> "Les spots sont des ampoule concus pour l'éclairage des staff...",
            'quantity'=> 78552,
            'price'=> 2556,
            'weight'=> 0.1455,
            'category_id'=> Category::where('name', '=', 'Spot led simple')->first()->id,
        ],
       
        /*End ampoule*/

        /*Start batterie*/
        [
            'name'=> 'Batterie de 7am',
            'image' => asset('storage/products/batterie7am.jfif'),
            'description'=> "Batterie de 7am ",
            'information'=> 'Batteries accompagnant un panneaux....',
            'quantity'=> 123,
            'price'=> 526,
            'weight'=> 0.5,
            'category_id'=> Category::where('name', '=', 'batterie de 18am')->first()->id,
        ],
       
        [
            'name'=> 'Batterie de 18am',
            'image' => asset('storage/products/batterie18am.jfif'),
            'description'=> "Batterie de 18am ",
            'information'=> 'Batteries accompagnant un panneaux....',
            'quantity'=> 78548,
            'price'=> 7421514,
            'weight'=> 0.5,
            'category_id'=> Category::where('name', '=', 'batterie de 18am')->first()->id,
        ],
        [
            'name'=> 'Batterie de 100am',
            'image' => asset('storage/products/batterie100.jfif'),
            'description'=> "Batterie de 100am ",
            'information'=> 'Batteries accompagnant un panneaux....',
            'quantity'=> 78548,
            'price'=> 7421514,
            'weight'=> 0.5,
            'category_id'=> Category::where('name', '=', 'batterie de 100am')->first()->id,
        ],
       /*end batterie*/ 

       /*start projecteur*/

        [
            'name'=> 'Projecteur de 60w',
            'image' => asset('storage/products/projecteur60.jfif'),
            'description'=> "Projecteur",
            'information'=> 'Ce type de panneau vous offre la possibilité....',
            'quantity'=> 78548,
            'price'=> 7421514,
            'weight'=> 0.5,
            'category_id'=> Category::where('name', '=', 'Panneaux de 60w')->first()->id,
        ],
        [
            'name'=> 'Projecteur de 100w',
            'image' => asset('storage/products/projecteur100w.jfif'),
            'description'=> "P ",
            'information'=> 'Ce type de panneau vous offre la possibilité....',
            'quantity'=> 78548,
            'price'=> 7421514,
            'weight'=> 0.5,
            'category_id'=> Category::where('name', '=', 'Panneaux de 100w')->first()->id,
        ],
        [
            'name'=> 'Projecteur de 200w',
            'image' => asset('storage/products/projecteur200w.jfif'),
            'description'=> "P ",
            'information'=> 'Ce type de panneau vous offre la possibilité....',
            'quantity'=> 78548,
            'price'=> 7421514,
            'weight'=> 0.5,
            'category_id'=> Category::where('name', '=', 'Panneaux')->first()->id,
        ],
        [
            'name'=> 'Projecteur de 300w',
            'image' => asset('storage/products/projecteur300w.jfif'),
            'description'=> "P ",
            'information'=> 'Ce type de panneau vous offre la possibilité....',
            'quantity'=> 78548,
            'price'=> 7421514,
            'weight'=> 0.5,
            'category_id'=> Category::where('name', '=', 'Panneaux de 300w')->first()->id,
        ],
       /*end projecteur*/ 

       /* Dijoncteur*/ 
        [
            'name'=> 'Dijoncteur unipolaire',
            'image' => asset('storage/products/dij-unipolaire.jfif'),
            'description'=> "Dijoncteur à ",
            'information'=> 'Dijoncteur est....',
            'quantity'=> 78548,
            'price'=> 7421514,
            'weight'=> 0.5,
            'category_id'=> Category::where('name', '=', 'prise de terre')->first()->id,
        ],
       
        [
            'name'=> 'Dijoncteur Différenciel',
            'image' => asset('storage/products/dij-differenciel.jfif'),
            'description'=> "Dijoncteur à ",
            'information'=> 'Dijoncteur est....',
            'quantity'=> 78548,
            'price'=> 7421514,
            'weight'=> 0.5,
            'category_id'=> Category::where('name', '=', 'Dijoncteur Différenciel')->first()->id,
        ],
        [
            'name'=> 'Dijoncteur DPN',
            'image' => asset('storage/products/dij-dpn.jfif'),
            'description'=> "Dijoncteur à .... ",
            'information'=> 'Dijoncteur est....',
            'quantity'=> 78548,
            'price'=> 7421514,
            'weight'=> 0.5,
            'category_id'=> Category::where('name', '=', 'Dijonteur DPN')->first()->id,
        ],
        [
            'name'=> 'Parafoudre Deux fille',
            'image' => asset('storage/products/parafoudre-2-fille.jfif'),
            'description'=> "Parafoudre. ",
            'information'=> 'Parafoudre....',
            'quantity'=> 78548,
            'price'=> 7421514,
            'weight'=> 0.5,
            'category_id'=> Category::where('name', '=', 'Parafoudre Deux fille')->first()->id,
        ],
       
    ]
];
