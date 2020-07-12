mongodb-php-casadocodigo
========================

MongoDB + PHP + Bootstrap
-------------------------

* Database.....: *test*
* Collection...: *seriados*

* Carga 

```
 mongo < db/seriados.js

```
* Exemplo de documento

```
db.seriados.findOne()
 
{
    "_id" : 1,
    "nome" : "Breaking Bad",
    "personagens" : [ 
        "Walter White", 
        "Skyler White", 
        "Jesse Pinkman", 
        "Hank Schrader", 
        "Marie Schrader ", 
        "Saul Goodman"
    ]
}
```

# Rodando


```
php -S localhost:8000 -t htdocs/

```

