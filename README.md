Video quete 12:
https://www.loom.com/share/f0d913bbda07414dabaf1e6d41a827bf

Video quete 13:
https://www.loom.com/share/ef24a7d319e342979d180b8a68068d25

Vidéo quete 14
https://www.loom.com/share/bf3a9a42d2054e6590e866f704338be9

Vidéo quete 15
https://www.loom.com/share/a9a1c79f6461458cb59847d281ceec66

# Project installation

## 1. Configure your environment

- Duplicate ".env" file and rename the duplicated file ".env.local"

- Customize the DATABASE_URL variable.

(Replace user & password in the example below)

```
DATABASE_URL=mysql://<user>:<password>@127.0.0.1:3306/wildseries?serverVersion=5.7
```

## 2. Install PHP dependencies

```
composer install
```

## 3. Import the datas

- Remove existing database

```
php bin/console doctrine:database:drop --force
```

- Create new database

```
php bin/console doctrine:database:create
```

- Import the database

```
php bin/console doctrine:database:import db.sql
```

## 4. Install JS dependencies

```
yarn install
```

## 5. Build Webpack JS & CSS source files

```
yarn dev
```

## 6. Start dev server

```
symfony server:start
```
