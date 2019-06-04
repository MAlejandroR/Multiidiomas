# Multiidiomas
 Para esta práctica sería conveniente seguir el wiki 
 http://es.wikieducator.org/Usuario:ManuelRomero/ProgramacionWeb/INAEM2019/Docker/ejemplo
 Tenemos que tener instalado
 * apache2
 * gettext
 * php-gettext
 * php-mbstring
 Hay que activar gettext en php.ini
<pre>
....
;extension=gd2
extension=gettext
;extension=gmp
....
</pre>
Como se establece en el enunciado hay que activar los idiomas deseados con 
locale 
<pre>
 sudo dpkg-reconfigure locales
</pre>
