#  Prueba técnica
## Desarrollador web


#  API 🛠️
## sistema de órdenes de pizzas,

## Comenzando 🚀


### Pre-requisitos 📋

tener previamente instalado y configurado los siguiente

- PHP 7
- Composer
- mysql

 
# instrucciones para levantar tu proyecto

en una teminal o CMD ejecutar los siguinete comandos en orden secuencial

```
git clone https://github.com/Juanhernandez1/pizeria.git
```

```
cd pizeria
```

instalar dependencias 
```
composer install
```

copiar archivo .env.example y renombrar el archivo a .env
o ejecutar 
```
cp .env.example .env
```


Dentro del Administrador de base de datos para mysql
- phpmyadmin
- mysqlworkbench

crear una base de datos llamda laravel

```
create database laravel
```

retonar a la teminarl 
# ejecutar migraciones
en el siguiente orden por motivos de relaciones 
```
php artisan migrate --path=database/migrations/2020_08_11_021339_create_departamentos_table.php
```
```
php artisan migrate --path=database/migrations/2020_08_11_015022_create_sucursales_table.php
```
```
php artisan migrate --path=database/migrations/2020_10_12_000000_create_users_table.php
```
tablas faltantes 
```
php artisan migrate
```

# cargando datos con seeder
```
php artisan db:seed
```

## Despliegue 📦

```
php artisan serve
```

## provar

- Insomnia
puede cargar el archivo de exportación contiene las peticiones solicitadas en la prueva
Insomnia_2020-08-12.json


# notas Adicionales

- para poder realizar peticiones de cualquier tipo nesecita logear se o registrarse 
en este caso seria primero registrarse y despues logearse

- en el archivo api.php ubicado en la siguiente ruta 

```
routes/api.php
```
en comentario se indica las rutas con las que se puede Realizar CRUD 

para probar, puede generar objetos con las propiedades indicadas en la propiedad de tipo array llamado $fillable dentro de los archivos correspondientes al modelo, estan dentro de la carpeta app,
siguiendo el mismo orden secuencial del array

ejemplo. sustituir "propiedad0" por la cadena que coresponde al indice 0 y de igual forma a completar todas y formar el objeto
```
{
    "propiedad0": "prueva"
    "propiedad1": "prueva"
}
```



- el campo de popularidad en la tabla de ingredientes se incrementara en 1 respectivamente cuando un pedido marque su estado en Entregado

- en pedidos la propiedad pizza deve contener un objeto de la siguiente forma como ejemplo
tiene que llevar la propiedad M que hace referencia al menu de pizzas y las porpiedad P que hace referencia a personalizada

Ejemplo.
```
"pizza": {
      "M": [ 1, 5],
      "P": [ [1, 2, 3, 4 ],
             [ 6, 7, 8, 2 ],
			 [ 9, 12, 8, 1 ]
      ]
    }
```
-- el array que contendara la propiedad M enlista los ID de las pizzas solicitades del menu de pizzas

-- los array que contiene la propiedad P enlista los ID de los ingredientes con los cuales se desea que preparen la pizza 

-- cada array en la propiedad P reprecenta 1 sola pizza personalizada en el Ejemplo se muestran 3 pizzas
 y cada elemento del array en la propieda M de igual forma reprecenta 1 pizza en el ejemplo se marcan 2

-- cuando se realiza un pediddo se calcula de forma automatica el total como la cantidad de pizzas pedidad en base al punto anteriror

-- se trabajó de dicha forma por que da mas libertad al momento de selecionar n cantidad de ingredientas 

--  la propiedad pizza descrita anteriormente es almacenada en la base de datos como una cadena de texto 


# puede probar desde heroku

```
https://pizeria.herokuapp.com/api/
```
- logearse en la Api

usuario de prueva enviar por post

```
https://pizeria.herokuapp.com/api/login
```

```
{
"username":"JuanH", "password":"1234"
	
}
```
 
-- puede no mostar datos y lanzar error debido a los id incremetales y add-ons de ClearDB MySQL incrementa en 10 




## Autor ✒️

* **Juan Hernandez** - *Trabajo Inicial* - 

---
⌨️ con ❤️ por [JuanHernandez](https://github.com/Juanhernandez1)

