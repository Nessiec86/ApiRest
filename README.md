## ApiRest

### Desarrollo de un nuevo endpoint

No he podido autenticar la conexión con ninguno de los métodos ofrecidos por Google Bigquery, aún así os adjunto el código y comento varios puntos, por si queréis revisarlo:

- No es posible verificar .json de configuración para autenticar la cuenta de servicio. Ni por fichero ni por variable de entorno.

- Separé el service google auth'/src/Service/GoogleCloud.php' y la url /getlist que iba a servir de endpoint '/src/Controller/gc.php'.

- Esta configurado en modo Debug.

- No pude recuperar las variables desde .env con getenv(). Por este motivo están declaradas directamente.

