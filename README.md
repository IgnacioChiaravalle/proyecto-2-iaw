# Administrador de Stock de *TheWaterLevel*

En este proyecto se desarrollará un administrador de stock para la empresa *TheWaterLevel*: una tienda de videojuegos y artículos de *merchandising* de los mismos, que además de vender juegos nuevos compra juegos usados y los revende. A continuación, se describirá qué datos deberá almacenar el administrador y qué usuarios podrán utilizarlo.

## Datos a Almacenar
### VideoJuegos
Para cada juego será fundamental almacenar su nombre, su compañía desarrolladora, su año de lanzamiento, su *rating* del organismo ESRB (si está disponible), y una foto de su portada, pudiéndose agregar también en forma opcional una de su contraportada. En *TheWaterLevel* es prioridad que los jugadores puedan aprovechar al máximo sus consolas, por lo que se para cada juego se almacenará, además, el listado de consolas en las que está disponible, y cuántas copias (nuevas y usadas) del título se tienen para cada consola. Por supuesto, un atributo que resulta fundamental para la compañía es el coste del videojuego tanto nuevo como usado, por lo que éste deberá ser guardado obligatoriamente.

### *Merchandising*
En *TheWaterLevel* es bien sabido que, para muchos, los videojuegos van más allá de un simple pasatiempo: hay quienes hasta se ganan la vida jugándolos y debatiendo sobre ellos. Esto es un claro símbolo de la importancia que le dan los consumidores a la industria, por lo que no es exagerado decir que muchos ven a los juegos como un estilo de vida. Para estas personas (¡y para todo aquél que esté interesado!), *TheWaterLevel* ofrece la mejor selección de *merchandising* que se pueda encontrar en el país. Se hallan a la venta artículos de todo tipo, por lo que el administrador de stock deberá almacenar para cada uno al menos un nombre que lo identifique, una imagen, una breve descripción del producto, y el nombre de la multimedia de la que proviene.<br>
Es importante destacar que podría haber artículos de *merchandising* que no tengan relación con ningún juego (si provinieran, por ejemplo, de series de televisión o películas) y juegos que no tengan relación con ningún artículo. Sin embargo, cuando estas relaciones sí existan sería altamente conveniente poder acceder al *merchandising* de un videojuego desde la sección dedicada a los datos del mismo, y viceversa (acceder a un juego desde la sección de uno de sus artículos de *merchandising*). Se decidirá si esto es o no implementado lo antes posible en el proceso de desarrollo, pero por ahora sólo se lo propone como idea.<br>
Existe también la intención de establecer algunas categorías de *merchandising* (indumentaria, accesorios, adornos y figuras, y quizás algunas más).
Los artículos de *merchandising* no se comprarán usados, por lo que todos los vendidos serán nuevos.

## Usuarios
### Administrador de Empresa
El usuario Adminsitrador de Empresa se tendrá permitida la creación de nuevos juegos para el stock de la tienda. Es decir, podrá definir nuevos juegos que antes no estuvieran en la base de datos, asignándoles sus precios y demás atributos; y podrá hacer lo correspondiente con los artículos de *merchandising*. Además, podrá editar los atributos de todos los productos a la venta.<br>
Del mismo modo, podrá eliminar juegos o artículos si fuera necesario por cualquier motivo.<br>
También tendrá la capacidad de dar de alta y de baja a los Empleados, así como modificar sus datos personales almacenados.

### Empleado
El usuario empleado es aquél que está en contacto directo con los clientes de *TheWaterLevel*, por lo que se encarga de mantener permanentemente actualizados los datos de stock del administrador. Además, su interfaz de usuario debería facilitarle el acceso a *merchandising* de los juegos vendidos (y viceversa), a fin de que pueda ofrecerlos a los clientes más adecuados.<br>
Es probable que el usuario Administrador de Empresa pueda hacer las veces de Empleado de ser necesario, pero para mantener ordenada la carga de datos se prevé que acceda al sistema como Empleado cuando lo necesite (lo que tal vez implique que su interfaz le permita el rápido acceso a la de los Empleados).<br>
Es altamente factible que se agreguen otras capacidades al usuario Empleado para facilitar su trabajo, pero a esta altura del desarrollo aún no se las ha definido.