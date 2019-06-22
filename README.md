# Ready To Use Roundcube-AutoLogin
Docs on Roundcube-AutoLogin can be found here <a href="https://github.com/alexjeen/Roundcube-AutoLogin">https://github.com/alexjeen/Roundcube-AutoLogin</a>

## Setup
Create .env file
```
cp .env.example .env
```
Edit .env file 
```
vim .env
```
Install getenv
```
docker-compose run composer "composer install"
```
Run containers
```
docker-compose up
```

## Usage
Visit <a href="http://localhost:8080">http://localhost:8080</a> and you will be redirected to Roundcube Mail Client on localhost:8000
