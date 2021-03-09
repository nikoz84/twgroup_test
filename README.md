## Desafío 1:
Al momento de iniciar un nuevo proyecto en Laravel debemos realizar una serie de pasos para configurar el proyecto dependiendo de sus requerimientos. Imagina que necesitamos una plataforma sobre Laravel que utilizará un motor de base de datos MySQL/MariaDB, un servidor de correos SMTP y un servidor Redis.

¿Cuáles son los pasos que consideras necesarios para dejar la aplicación funcionando en modo de desarrollo? (Describe los comandos necesarios que ejecutarías y que archivos modificarías en base a los requerimientos mencionados).

`composer create-project laravel/laravel tw-group-test`

En el archivo .env creado modificar los datos de acceso a los servidores redis, smpt y mysql

```conf
APP_NAME="TWGroup"

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=password

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=user
MAIL_PASSWORD=password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS='from@example.com'
MAIL_FROM_NAME="${APP_NAME}"

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=password
REDIS_PORT=6379
```

## Desafío 2:
Laravel cuenta con un ORM llamado Eloquent, este ORM nos permite simplificar las consultas a la base de datos, imagina los siguientes modelos con los siguientes atributos.

Publication (id, title, content, user_id)
Comment (id, publication_id, content, status)

Imagina que existe la relación "Una publicación puede tener 0 o más comentarios", ¿Cómo definirías las funciones de relación en ambos modelos?

```php
public function comments()
{
    return $this->hasMany(Comment::class, 'id', 'publication_id')
        ->orderBy('status', 'APROBADO');
}
```


## Desafío 3:
Imaginando los modelos anteriormente mencionados, crea una Query en Eloquent (Obligatorio) que obtenga: Todas las publicaciones que contengan comentarios con la palabra "Hola" en su contenido, y que además posean status "APROBADO".

```php
$publication = Publication::with(['comments' => function($q){
    $q->where('status', 'APROVADO')
        ->where('content', 'LIKE', "%Hola%");
}])->paginator(15);
```


O se puede crear un scopo para tener ese mismo resultado:

```php
public function scopeSearchByTerm($query, $term)
{
    if (!$query) {
        return;
    }
    return $query->where('content', 'like', "%?%", $term)
        ->where('status', 'APROVADO');
}
```

En nuestro controlador podemos accesar:
```php
$commnent = new Comment;

$comment->searchByTerm($term);

```


## Desafío 4:
En Laravel existen las migraciones, en base a tu experiencia ¿Cuáles son las ventajas que nos entrega el uso de migraciones en una aplicación Laravel funcionando en un servidor de producción?

Respuesta: Permite tener un control de version de la base de datos por ejemplo nos permite crear, monificar o deshacer cambios en las tablas. Con los comandos (php artisan migrate :rollback :refresh) podemos ingresar via SSH en el servidor de producción y hacer los cambios correspondientes en la
base de datos en vez de hacerlo por via de comando para cargar un script o algún cliente.


## Desafío 5:

En base a lo anterior, realiza una pequeña aplicación en Laravel que conste de las siguientes tablas:

Tablas de la Base de Datos:

users
publications
comments

`php artisan migrate` Crear la estructura de datos
`php artisan db:seed` Para popular con datos de test

La petición es:
Realiza un CRUD, utiliza Bootstrap y en las vistas el uso de Layouts en Blade.
El CRUD debe consistir en un formulario, en la cual se puedan realizar publicaciones.
Para ingresar a esta vista, es necesario estar autenticado en el sistema, no se puede acceder a las rutas de este si no esta autenticado.
Se debe desplegar una lista de las publicaciones ya existentes.
Al momento de entrar a visualizar una publicación, debe existir la posibilidad de poder visualizar todos los comentarios y además ingresar un comentario en la publicación, en caso de que el usuario ya haya comentado la publicación, este no podrá volver a realizar dicha acción.
Al momento de que se genere un nuevo comentario, es necesario que se envíe un correo electrónico al autor de la publicación (Puedes utilizar Mailtrap para Testing, aunque lo importante no es la evidencia del envío, sino el código).
Recuerda usar bootstrap en el diseño, y que puedes ingresar todas las publicaciones que quieras, insertando campos en la tabla publications.




