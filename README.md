# Time Chamber - Documentação do Projeto

## Descrição

**Time Chamber** é uma aplicação desenvolvida para gerenciar usuários e autenticação em uma academia fictícia. Ele oferece funcionalidades como cadastro de usuários, login, e envio de e-mails de boas-vindas.

## Problema Resolvido

O projeto resolve a necessidade de gerenciar o cadastro de usuários em uma academia, com validação de dados, autenticação segura e envio de e-mails de boas-vindas.

## Técnicas e Tecnologias Utilizadas

- **Laravel PHP Framework**: Utilizado para o desenvolvimento do backend.
- **Eloquent ORM**: Facilita a interação com o banco de dados.
- **JWT (JSON Web Tokens)**: Utilizado para autenticação.
- **Docker**: Ambiente de desenvolvimento isolado.
- **Thunder Client no VSCode**: Utilizado para testar as rotas da aplicação.

## Executando o Projeto

1. Clone o repositório do GitHub:

   ```bash
   git clone https://github.com/seu-usuario/time-chamber.git
Navegue até o diretório do projeto:

bash

cd time-chamber
Crie um arquivo .env baseado no .env.example e configure seu banco de dados.

Instale as dependências do Composer:

bash

composer install
Execute as migrações e seeders para criar o banco de dados:

bash

php artisan migrate --seed
Inicie o servidor:

bash

php artisan serve
O projeto estará disponível em http://localhost:8000.

Rotas da Aplicação
Cadastro de Usuário
Rota: POST /api/users

Requisição:

json

{
  "name": "Nome do Usuário",
  "email": "usuario@exemple.com",
  "date_birth": "1990-01-01",
  "cpf": "123.456.789-09",
  "password": "senha123",
  "plan_id": 1
}
Resposta:

HTTP Status Code 201 (CREATED) em caso de sucesso, com os detalhes do usuário (exceto password e remember_token).

HTTP Status Code 400 (Bad Request) em caso de dados inválidos, com mensagem de erro explicativa.

Login
Rota: POST /api/login

Requisição:

json

{
  "email": "juliocezar.jandt@gmail.com",
  "password": "senha123"
}
Resposta:

HTTP Status Code 200 (OK) em caso de sucesso, com o token JWT válido por 24 horas e o nome do usuário.

HTTP Status Code 400 (Bad Request) em caso de dados inválidos, com mensagem de erro explicativa.

HTTP Status Code 401 (UNAUTHORIZED) em caso de login inválido.

Melhorias Futuras
Implementação de middleware para tratamento de exceções.
Aprimoramento da estrutura de diretórios.
Adição de mais testes automatizados.
Integração de front-end para uma experiência completa.
Melhorias na segurança, como HTTPS e validação adicional.
Documentação expandida e mais detalhada.
Sinta-se à vontade para explorar, contribuir e sugerir melhorias para o projeto Time Chamber!










<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
#   P r o j e t o _ m o d u l o _ 2 
 
 
