# Proyecto FP Dual - Solicitud Alumno

Este proyecto es una aplicación web para gestionar solicitudes de alumnos a empresas para realizar prácticas. La aplicación incluye una API para manejar las solicitudes y las relaciones entre alumnos y empresas.

## Requisitos

- PHP >= 7.4
- Composer
- Laravel >= 8.x
- MySQL o cualquier otra base de datos compatible con Laravel

## Instalación

Sigue estos pasos para instalar y configurar el proyecto:

1. Clona el repositorio:
    ```sh
    git clone https://github.com/tu-usuario/proyecto-fp-dual.git
    cd proyecto-fp-dual
    ```

2. Instala las dependencias de PHP usando Composer:
    ```sh
    composer install
    ```

3. Copia el archivo de configuración de entorno y edítalo con tus propias credenciales:
    ```sh
    cp .env.example .env
    ```

4. Genera la clave de la aplicación:
    ```sh
    php artisan key:generate
    ```
4.1 Crear link para el cv
    php artisan storage:link

5. Configura la base de datos en el archivo [.env](http://_vscodecontentref_/1):
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nombre_de_tu_base_de_datos
    DB_USERNAME=tu_usuario
    DB_PASSWORD=tu_contraseña
    ```

6. Ejecuta las migraciones para crear las tablas en la base de datos:
    ```sh
    php artisan migrate
    ```

7. (Opcional) Si tienes datos de prueba, puedes ejecutarlos:
    ```sh
    php artisan db:seed
    ```

8. Inicia el servidor de desarrollo:
    ```sh
    php artisan serve
    ```

## Uso de la API

### Crear una solicitud

**Endpoint:** `POST /api/requests`

**Ejemplo de solicitud:**
```sh
curl -X POST http://localhost:8000/api/requests \
     -H "Content-Type: application/json" \
     -d '{
           "student_id": 1,
           "company_id": 2,
           "question": "¿Puedo hacer mis prácticas aquí?"
         }'
