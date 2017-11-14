#e-commerce
e-commerce is a website that sells various items online.
It provides an API for developers to:

1- Retrieve items through [getitems](http://husseinferas.com/api/getitems)

```http://husseinferas.com/api/getitems```

**GET Method**

  the result will be in the following form :
 ```angular2html
   "items": [
     {
       "id": 1,
       "name": "Sport Shose",
       "price": 76,
       "image": "68rFJ5005R.png",
       "category_id": 5,
       "created_at": "2017-08-16 16:30:27",
       "updated_at": "2017-08-17 07:14:13"
     },
 ```
2- Register through [register](http://husseinferas.com/api/create)

```http://husseinferas.com/api/create```

**POST method**

data must be sent in this form :
 ```angular2html
 
        "user": {
            "name": "",
            "email": "",
            "password": "",
            "re_password":""        }
   
```
    
3.Log in through [login](http://husseinferas.com/api/login)

```http://husseinferas.com/api/login```

**POST method**

data must be sent in this form :

```  
        "user": {
               "email": "",
               "password": ""
                    }
```
### ecommerce
# e-commerce
