# Proyecto Broobe Challenge

## Requisitos

- PHP 7.4 o superior
- Composer
- Node.js y npm
- MySQL

## Instalación

# 1. Clonar el Repositorio

bash
git clone https://github.com/tu-usuario/broobe-challenge.git
cd broobe-challenge

# 2. Instalar Dependencias de PHP

composer install

# 3. Instalar Dependencias de JavaScript
npm install
# 4. Configurar el Archivo .env
Renombra el archivo .env.example a .env y configura tus variables de entorno, especialmente la conexión a la base de datos.
Asegúrate de actualizar las siguientes variables en tu archivo .env:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
GOOGLE_API_KEY=api_key

# 5. Generar la Clave de la Aplicación
php artisan key:generate
# 6. Migrar la Base de Datos
php artisan migrate
