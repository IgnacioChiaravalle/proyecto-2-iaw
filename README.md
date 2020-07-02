# Administrador de Stock de *TheWaterLevel*

En este proyecto se desarrolló un administrador de stock para la empresa *TheWaterLevel*: una tienda de videojuegos y artículos de *merchandising* de los mismos, que además de vender juegos nuevos compra juegos usados y los revende. A continuación, se describirá qué datos deberá almacenar el administrador y qué usuarios podrán utilizarlo. Luego, se dará una explicación del uso de la API desarrollada para el proyecto, que permite ejecutar algunas consultas y actualizaciones sobre su base de datos.

## Datos a Almacenar
### VideoJuegos
Para cada juego será fundamental almacenar su nombre, sus compañías desarrolladoras, su año de lanzamiento, su *rating* del organismo ESRB (si está disponible), y una foto de su portada, pudiéndose agregar también en forma opcional una de su contraportada. En *TheWaterLevel* es prioridad que los jugadores puedan aprovechar al máximo sus consolas, por lo que para cada juego se almacenará, además, el listado de consolas en las que está disponible, y cuántas copias (nuevas y usadas) del título se tienen para cada consola. Por supuesto, un atributo que resulta fundamental para la compañía es el coste del videojuego tanto nuevo como usado, por lo que éste deberá ser guardado obligatoriamente.

### *Merchandising*
En *TheWaterLevel* es bien sabido que, para muchos, los videojuegos van más allá de un simple pasatiempo: hay quienes hasta se ganan la vida jugándolos y debatiendo sobre ellos. Esto es un claro símbolo de la importancia que le dan los consumidores a la industria, por lo que no es exagerado decir que muchos ven a los juegos como un estilo de vida. Para estas personas (¡y para todo aquél que esté interesado!), *TheWaterLevel* ofrece la mejor selección de *merchandising* que se pueda encontrar en el país. Se hallan a la venta artículos de todo tipo, por lo que el administrador de stock deberá almacenar para cada uno un nombre que lo identifique, una imagen, una breve descripción del producto, el nombre de la multimedia de la que proviene, y, por supuesto, su precio.

Es importante destacar que podría haber artículos de *merchandising* que no tengan relación con ningún juego (si provinieran, por ejemplo, de series de televisión, películas, o bandas musicales, pues nuestro *merchandising* no conoce los límites de la creatividad) y juegos que no tengan relación con ningún artículo. Sin embargo, cuando estas relaciones sí existan sería altamente conveniente poder acceder al *merchandising* de un videojuego desde la sección dedicada a los datos del mismo, y viceversa (acceder a un juego desde la sección de uno de sus artículos de *merchandising*). Por este motivo, el administrador de stock proveerá exactamente esta función.

También se establecerán algunas categorías de *merchandising* (indumentaria, accesorios, adornos y figuras, y quizás algunas más).

Los artículos de *merchandising* no se comprarán usados, por lo que todos los vendidos serán nuevos.

## Usuarios
### Administrador de Empresa
El usuario Adminsitrador de Empresa se tendrá permitida la creación de nuevos juegos para el stock de la tienda. Es decir, podrá definir nuevos juegos que antes no estuvieran en la base de datos, asignándoles sus precios y demás atributos; y podrá hacer lo correspondiente con los artículos de *merchandising*. Además, podrá editar los atributos de todos los productos a la venta.

Del mismo modo, podrá eliminar juegos o artículos si fuera necesario por cualquier motivo.

### Empleado
El usuario Empleado es aquél que está en contacto directo con los clientes de *TheWaterLevel*, por lo que se encarga de mantener permanentemente actualizados los datos de stock del administrador. Además, su interfaz de usuario debería facilitarle el acceso a *merchandising* de los juegos vendidos (y viceversa), a fin de que pueda ofrecerlos a los clientes a la hora de hacer una venta.

Es probable que el usuario Administrador de Empresa pueda hacer las veces de Empleado de ser necesario, pero para mantener ordenada la carga de datos se prevé que acceda a la interfaz del Empleado cuando lo necesite (lo que implica que su interfaz le permitirá el rápido acceso a la de los Empleados).

## API
Se desarrolló una API para tener acceso rápido a algunas de las funciones del usuario Empleado, sin la necesidad de que éste acceda directamente al sistema. Si bien se incluirá entre los archivos del proyecto un archivo con algunas consultas de ejemplo, se aprovechará esta sección para explicar el formato y función de cada una de las consultas posibles, de modo que, si así lo desea, el lector pueda testear las suyas propias. Es importante destacar que todas las URI válidas implementadas son del tipo GET.

Todas las consultas requieren, como medida de seguridad, incluir el api_token de un usuario que exista en la base de datos del administrador de stock. Pese a que hay numerosas formas de incluirlo en la herramienta Postman, se sugiere hacerlo en forma de *Header*, donde la clave (*KEY*) será "Authorization" y el valor (*VALUE*) será "Bearer {api_token}", reemplazando "{api_token}" por el api_token del usuario deseado. De este modo, la información enviada no será trivialmente visible en la URI de la consulta, garantizando una mayor seguridad y protección a los datos del usuario. Para más detalles sobre el api_token de usuario, se puede consultar el video de presentación del proyecto, para el cual se provee un *link* al final de este texto.

### Consulta de Datos de Usuario
Una de las consultas más simples que pueden hacerse es aquella en la que se solicitan los datos de usuario **no ocultos** (es decir, todos menos su password y su api_token, que son datos privados y no deben poder recuperarse tan fácilmente). Para esto basta con incluir el api_token (como se explicó anteriormente, ya que éste le indicará a la API los datos de qué usuario debe retornar) en una consulta con la siguiente URI:
* [Link de Heroku]/api/user

### Consultas Sobre Videojuegos
La API permite obtener todos los datos de los videojuegos, e incluso modificar su stock. Para esto, se debe comenzar la URI con *[Link de Heroku]/api/gamesforsale*, siguiéndola con la forma necesaria para la consulta deseada. A continuación se mostrará cuáles son las consultas sobre videojuegos válidas. Téngase en cuenta que los valores entre llaves ('{', '}') deberán ser reemplazados por el valor deseado.

* Obtener el listado completo de videojuegos en venta, con todos los datos de cada uno **excepto** la codificación de sus portadas: [Link de Heroku]/api/gamesforsale
* Obtener todos los datos del videojuego con nombre {gameName}, **excepto** la codificación de sus portadas: [Link de Heroku]/api/gamesforsale/getgame/{gameName}
* Obtener las codificaciones de las portadas del videojuego con nombre {gameName}: [Link de Heroku]/api/gamesforsale/getgamecovers/{gameName}
* Obtener el listado completo de desarrolladores de videojuegos conocidos en la base de datos: [Link de Heroku]/api/gamesforsale/getdevslist
* Obtener los desarrolladores del videojuego con nombre {gameName}: [Link de Heroku]/api/gamesforsale/getgamedevs/{gameName}
* Obtener el listado completo de consolas de videojuegos conocidas en la base de datos: [Link de Heroku]/api/gamesforsale/getconsoleslist
* Obtener el listado completo de consolas en las que está disponible el videojuego con nombre {gameName}, incluyendo la cantidad de copias nuevas y usadas del título en cada consola: [Link de Heroku]/api/gamesforsale/getgameconsoles/{gameName}
* Obtener la cantidad de copias nuevas y usadas del videojuego con nombre {gameName} en la consola con nombre {consoleName}: [Link de Heroku]/api/gamesforsale/getgameconsolecopies/{gameName}/{consoleName}
* Editar el stock del videojuego con nombre {gameName} en la consola con nombre {consoleName}, ingresando *new* para las copias nuevas o *used* para las usadas en el campo {newOrUsed}, y el valor en el cual se las quiera aumentar (valor positivo) o disminuir (valor negativo) en el campo {value}: [Link de Heroku]/api/gamesforsale/changegamestock/{gameName}/{consoleName}/{newOrUsed}/{value}

En el último caso, si {value} es negativo y remover esa cantidad de copias haría que se tenga una cantidad negativa en la base de datos, **no se efectuará el cambio**.

### Consultas Sobre Artículos de Merchandising
La API permite obtener todos los datos de los artículos de *merchandising*, e incluso modificar su stock. Para esto, se debe comenzar la URI con *[Link de Heroku]/api/merchforsale*, siguiéndola con la forma necesaria para la consulta deseada. A continuación se mostrará cuáles son las consultas sobre artículos de *merchandising* válidas. Téngase en cuenta que los valores entre llaves ('{', '}') deberán ser reemplazados por el valor deseado.

* Obtener el listado completo de artículos de *merchandising* en venta, con todos los datos de cada uno **excepto** la codificación de su foto: [Link de Heroku]/api/merchforsale
* Obtener todos los datos del artículo de *merchandising* con nombre {merchName}, **excepto** la codificación de su foto: [Link de Heroku]/api/merchforsale/getmerch/{merchName}
* Obtener las codificaciones de la foto del artículo de *merchandising* con nombre {merchName}: [Link de Heroku]/api/merchforsale/getmerchphoto/{merchName}
* Obtener el listado completo de categorías de *merchandising* presentes en la base de datos: [Link de Heroku]/api/merchforsale/getcategorieslist
* Obtener las categorías a las que pertenece el artículo de *merchandising* con nombre {merchName}: [Link de Heroku]/api/merchforsale/getmerchcategories/{merchName}
* Editar el stock del artículo de *merchandising* con nombre {merchName}, ingresando el valor en el cual se lo quiera aumentar (valor positivo) o disminuir (valor negativo) en el campo {value}: [Link de Heroku]/api/merchforsale/changemerchstock/{merchName}/{value}

En el último caso, si {value} es negativo y remover esa cantidad de unidades haría que se tenga una cantidad negativa en la base de datos, **no se efectuará el cambio**.

## Link del Video de Presentación del Proyecto
El video de presentacion del proyecto se encuentra disponible en la siguiente dirección: [Link del Video]
