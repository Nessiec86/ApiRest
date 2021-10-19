## ApiRest

### Desarrollo de un nuevo endpoint


- Service google auth '/src/Service/GoogleCloud.php'

- Controler '/src/Controller/gc.php', para habilitar el endpoint /getList.

- No es posible recuperar las variables desde .env con getenv(). Por este motivo están declaradas directamente.

- No es posible verificar .json de configuración para autenticar la cuenta de servicio. Ni por fichero ni por variable de entorno.

