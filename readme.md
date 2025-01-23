# Installation

Cloner le projet :
```
git clone https://github.com/CelienFiorelli/docker-app.git
```

Docker :
```
docker-compose up
```

Dans le container `docker-app-api` initialiser la base de donnée
```
php artisan migrate
php artisan db:seed
```