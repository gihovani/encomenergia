# Site da Encom Energia

Aplicação precisa dos serviços:
- mariadb ou mysql 
- php
- apache
- composer

Passos para instalar a aplicação:

- Instalar Dependências do projeto
```
composer install
```

- Editar arquivo:
    - application/config/database.php

- Rodar as migrações para incluir os dados no banco de dados:    
```
php index.php migrate index
```

# Autores 
[Gihovani Filipp](https://gg2.com.br)
[Guilherme Sousa](https://guilhermesousa.com.br) 



