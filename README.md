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


> ![Compre agora](https://github.com/boaglio/boaglio/blob/master/mongodb.png)
>
> :green_book: este repositório faz parte do livro *MongoDB*
>
> :face_with_head_bandage: [ajude o meu trabalho e compre uma cópia](https://www.casadocodigo.com.br/products/livro-mongodb)!
>
> custa menos que um :hamburger: lanche :fries:!
