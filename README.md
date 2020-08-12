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

en una teminal o CMD ejecutar los siguinete comando en orden secuencial

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
.env 
copiar .env.example y renombrar el archivo a .env
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
php artisan migrate --path=database/migrations/2020_08_11_021339_create_departamentos_table.php
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
puede cargar contiene lo solicutado en la prueva
Insomnia_2020-08-12.json


# notas Adicionales

- para poder realizar peticiones de cualquier tipo nesecita logear se o registrarse 
en este caso seria primero registrarse y despues logearse

- en el archivo api.php ubicado en la siguiente ruta 

```
routes/api.php
```
en comentario se indica las rutas con las que se puede Realizar CRUD 

para porbar, puede gerar objetos con las propiedades inidicadas en la propiedad de tipo array llamado $fillable dentro de los archivos corespondientes al modelo que estan entran dentro de la carpeta app siguiendo el mismo orden secuencial del array

ejem. sustituir "propiedad0" por la cadena que coresponde al indice 0 y de igual forma a completar todas y formar el objeto
```
{
    "propiedad0": "prueva"
    "propiedad1": "prueva"
}
```



- el capo de popularidad en la tabla de ingredientes se incrementara en 1 respectivamente cuando un pedido marque su estado en Entregado

- en pedidos la propiedad piza deve contener un objeto de la siguiente forma como ejemplo
tiene que llevar la propieda M que ahce referencia al menu de pizzas y las porpiedad P que hace referencia a personalizada
```
"pizza": {
      "M": [ 1, 5],
      "P": [ [1, 2, 3, 4 ],
             [ 6, 7, 8, 2 ],
			 [ 9, 12, 8, 1 ]
      ]
    }
```
-- el arreglo que contendara la propiedad M enlistas los ID de las pizzas solicitades del menu de pizzas

-- los areglos que contiene la propiedad P enlista los ID de los ingredientes con los cuales se desea que preparen la piza 

-- cada array en la propiedad P reprecenta 1 sola pizza personalizada en el Ejemplo se puestran 3 pizzas
 y cada elemto del array en la propieda M de igual forma reprecenta 1 pizza en el ejemplo se marcar 2

-- cuando se realizar un pediddo se calcula de forma automatica el total como la cantidad de pizzas pedidad en base al punto anteriror

-- se trabajo de dicha forma por que da mas libertada al momento de selecionar n cantidad de ingredientas 

-- dicha propieda es almacenada en la base de datos como una cadena de texto 



## Autor ✒️

* **Juan Hernandez** - *Trabajo Inicial* - 

---
⌨️ con ❤️ por [JuanHernandez](https://github.com/Juanhernandez1)

# Disculpas por algun error de ortografía :0