#!/bin/bash

echo "🐳 Configurando proyecto Laravel con Docker..."

# Crear directorios necesarios
mkdir -p docker/nginx
mkdir -p docker/php
mkdir -p docker/mysql

echo "📁 Directorios creados"

# Crear archivo .env para Docker (copia del original con cambios necesarios)
cp .env .env.docker
sed -i 's/DB_HOST=localhost/DB_HOST=mysql/' .env.docker
sed -i 's/APP_URL=http:\/\/localhost/APP_URL=http:\/\/localhost:8080/' .env.docker

echo "⚙️  Archivo .env.docker creado"

# Construir y levantar contenedores
echo "🔨 Construyendo contenedores..."
docker compose up -d --build

echo "⏳ Esperando que los servicios estén listos..."
sleep 15

# Ejecutar comandos de Laravel dentro del contenedor
echo "🔧 Configurando Laravel..."
docker compose exec app composer install
docker compose exec app php artisan key:generate
docker compose exec app php artisan config:cache
docker compose exec app php artisan route:cache
docker compose exec app php artisan storage:link

# Ejecutar migraciones (opcional, descomenta si tienes migraciones)
# docker compose exec app php artisan migrate --seed

echo "✅ ¡Configuración completada!"
echo ""
echo "🌐 Accede a tu aplicación en:"
echo "   - Laravel: http://localhost:8080"
echo "   - PhpMyAdmin: http://localhost:8081"
echo "   - Vite Dev Server: http://localhost:5173"
echo ""
echo "📝 Comandos útiles:"
echo "   - Ver logs: docker compose logs -f"
echo "   - Parar servicios: docker compose down"
echo "   - Reiniciar: docker compose restart"
echo "   - Ejecutar artisan: docker compose exec app php artisan [comando]"
echo "   - Acceder al contenedor: docker compose exec app bash"
