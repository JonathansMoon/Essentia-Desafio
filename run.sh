echo Start docker
sudo docker-compose up -d

echo Copying the configuration example file
docker exec -it essentia-app cp .env.example .env

echo Install dependencies
docker exec -it essentia-app composer install

echo Make migrations
docker exec -it essentia-app php artisan migrate

echo key generate
docker exec -it essentia-app php artisan key:generate

echo symbolic link
docker exec -it essentia-app php artisan storage:link

echo Install dependencies NPM
npm install

echo preprocess sass
npm run dev
