# Envíos Andreani - Magento 1
### Requisitos
  - php extension habilitada: php_soap
  - php extension habilitada: php_openssl
  - php GD (2.0.28 o superior) 
  - (Recomendado) Librería zlib

### Instalación

Borrar el caché que se encuentra en el directorio var/cache y todas las cookies en el dominio de la tienda. Deshabilitar compilación para Magento 1.4+. Este paso elimina muchos potenciales problemas.

1. Hacer backup de los datos
2. Descargar el contenido de este repositorio y extraer
3. Navegar dentro del directorio Andreani y seleccionar "app" y "lib". Usando el cliente FTP subir el contenido al root de la tienda
4. Desloguearse
5. Borrar cache nuevamente e ingresar al panel administrador (si ya estaba logueado hay que desloguearse e ingresar nuevamente)

### Importante

Asegurarse que su Magento use las siguientes extensiones
- \app\design\frontend\default\default\template\checkout\onepage\shipping.phtml
- \app\design\frontend\default\default\template\customer\address\edit.phtml
- \app\design\frontend\default\default\template\persistent\checkout\onepage\billing.phtml
- \app\design\frontend\default\default\template\shipping\tracking\popup.phtml
- \app\design\frontend\default\default\template\checkout\onepage\shipping_method/available.phtml

### Configuración

1. Ir a System -> Configuration -> Shipping Methods
2. Expandir las siguientes pestañas: "Andreani Urgente" "Andreni Estandar" y "Andreani Sucursal". 
3. Completar con su número de cliente y números de contrato

### Características

##### Para vendedores
 - Configurar usuario y contraseña eAndreani. 
 - Ingresar el contrato para cada servicio de envío (estándar, a sucursal, urgente).
 - Activar/Desactivar independientemente los servicios de envío.
 - Configurar titulo y descripción de cada servicio
 - Seleccionar unidad de peso/volúmen de los productos (gramos/cm3 o kg/m3).
 - Documentación completa con instalación paso por paso.
 - Integración con Google Maps para geolocalización a partir de los datos del comprador.
 - Incluye variables de costo de envío según el precio, el peso, el volúmen del producto y la distancia de envío.

##### Para compradores
 - Calculador de costo de envío automático.
 - Detección de la ubicación a través de la dirección.
 - Detección y distancia hasta la sucursal más cercana para "Envíos a sucursal".
 - Servicio de envío urgente.
 - Rastreo (tracking) del envío en todo momento.
