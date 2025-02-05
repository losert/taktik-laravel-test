# Laravel - test

## Instalace

1. V příkazové řádce spustit:
```bash
$ make create-project
$ make install-recommend-packages
$ make init
```

## Spuštění
1. Projekt se spouští příkazem `$ make up`
2. URL adresa je `localhost`
3. URL adresa pro PHPMyAdmin `localhost:7002` (přihlašovací údaje: USER: test, PASSWORD: test, DATABASE: test)


## Ostatní

1. Další příkazy najdete v souboru: `/Makefile`


## API URLs 

```bash
GET /api/tasks – výpis úkolů 
GET /api/tasks/{id} – detail úkolu
POST /api/tasks – vytvoření nového úkolu
PUT /api/tasks/{id} – aktualizace úkolu
DELETE /api/tasks/{id} – smazání úkolu
```


