**Newbie**
============
Es un mini framework creado en php, basado en el paradigma de MVC, Actualmente se encuentra en modo Alfa.

Características:
--------
####**Modelos:**
Actualmente todos los modelos deben extender de la clase abstracta Modelo, esta tiene ya métodos definidos que puede ser usado en cualquier de los otros controladores. Actualmente se busca manejar la forma de crear y editar campos.
####**Controladores:**
Los controladores todos deben implementar la interfaz Controller, se recomienda que el controllador tenga mismo nombre de clase como el archivo, agregando como sufijo Controller ejem: nombre de clase: (*UsersController*) y nombre archivo (*UsersController.php*).

####**Helpers:**
Actualmente se cuenta con algunos helpers que los pueden encontrar en el archivo *App/Tools/Helper.php*, los cuales destacan el view, redirect y route.
####**Vistas/Layout:**
Se encuentran en la carpeta *resource/view* tanto layout y vistas se llaman a través del helper view().
####**BD:**
Actualmente los datos de configuracion de BD se hacen directamente en el archivo *config/Connection.php*, solo hay soporte para **Mysql**.
####**Rutas:**
No hay un sistema definido de rutas, ya que las mismas se crean con el parámetro *midomio.com/Controller/Metodo/Parametros* entonces las rutas irán ligadas a ese formato.
______
Alguna sugerencia o duda lo pueden hacer en  twitter: [@RDuuke](http://www.twitter.com/rduuke)
