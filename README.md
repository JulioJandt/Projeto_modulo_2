
# Time Chamber - Documentação do Projeto

### Descrição
Time Chamber é uma aplicação desenvolvida para gerenciar usuários, exercícios, estudantes e treinos em uma academia fictícia. Ele oferece funcionalidades como cadastro de usuários, login, criação e listagem de exercícios, cadastro e listagem de estudantes, gerenciamento de treinos, exportação de PDF e dashboard com estatísticas.

## Configuração do Ambiente

### Banco de Dados
Utiliza o PostgreSQL como Sistema Gerenciador de Banco de Dados.
O nome do banco de dados é academia_api.
Execute a seed para popular o banco de dados: php artisan db:seed PopulatePlans.
Executando o Projeto Laravel
Clone o repositório do GitHub:

git clone https://github.com/JulioJandt/Projeto_modulo_2.git

### Navegue até o diretório do projeto:

- cd time-chamber
- Crie um arquivo .env baseado no .env.example e configure seu banco de dados.

### Instale as dependências do Composer:

-composer install

### Execute as migrações e seeders para criar o banco de dados:

- php artisan db:seed PopulatePlans
- php artisan migrate 

### Inicie o servidor:

- php artisan serve

O projeto estará disponível em http://localhost:8000.

## Rotas da Aplicação

### Cadastro de Usuário (S01)
Rota: POST /api/users

- Requisição em json:

```http
{
  "name": "Nome do Usuário",
  "email": "usuario@exemple.com",
  "date_birth": "1990-01-01",
  "cpf": "123.456.789-09",
  "password": "senha123",
  "plan_id": 1
} 
        ```
    
- Resposta:

HTTP Status Code 201 (CREATED) em caso de sucesso, com os detalhes do usuário (exceto password e remember_token).

HTTP Status Code 400 (Bad Request) em caso de dados inválidos, informando mensagem de erro explicativa.

### Login (S02)
Rota: POST /api/login

- Requisição:

```http
{
  "email": "juliocezar.jandt@gmail.com",
  "password": "senha123"
}
    ```
- Resposta:

HTTP Status Code 200 (OK) em caso de sucesso, com o token JWT válido por 24 horas e o nome do usuário.

HTTP Status Code 400 (Bad Request) em caso de dados inválidos, informando mensagem de erro explicativa.

HTTP Status Code 401 (UNAUTHORIZED) em caso de login inválido.

### Dashboard (S03)
Rota: GET /api/dashboard

- Response em json:
    ```http
{
  "registered_students": 10,
  "registered_exercises": 5,
  "current_user_plan": "Bronze",
  "remaining_students": 5
}
    ```
    
Status Codes:

HTTP Status Code 200 (OK), com as estatísticas do dashboard.
Cadastro de Exercícios (S04)
Rota: POST /api/exercises

- Requisição em json:

{
  "description": "Exercício 1"
}
- Resposta:

HTTP Status Code 201 (CREATED) em caso de sucesso, com os detalhes do exercício.

HTTP Status Code 400 (Bad Request) em caso de dados inválidos, informando mensagem de erro explicativa.

HTTP Status Code 409 (Conflict) em caso de exercício já cadastrado para o mesmo usuário.

### Listagem de Exercícios (S05)
Rota: GET /api/exercises

- Response:

[
  {
    "id": 1,
    "description": "Exercício 1"
  },
  {
    "id": 2,
    "description": "Exercício 2"
  }
]
Status Codes:

HTTP Status Code 200 (OK), com a lista de exercícios ordenada pela descrição.
Deleção de Exercícios (S06)
Rota: DELETE /api/exercises/:id

Status Codes:

HTTP Status Code 204 (NO CONTENT) em caso de sucesso.

HTTP Status Code 409 (CONFLICT) em caso de treinos vinculados ao exercício.

HTTP Status Code 403 (FORBIDDEN) em caso do exercício não pertencer ao usuário autenticado.

HTTP Status Code 404 (NOT FOUND) em caso do exercício não existir.

### Cadastro de Estudante (S07)
Rota: POST /api/students

- Requisição:

{
  "name": "Estudante 1",
  "email": "estudante1@example.com",
  "date_birth": "1995-05-15",
  "cpf": "123.456.789-09",
  "contact": "123456789",
  "plan_id": 1
}
- Resposta:

HTTP Status Code 201 (CREATED) em caso de sucesso, com os detalhes do estudante.

HTTP Status Code 400 (Bad Request) em caso de dados inválidos, informando mensagem de erro explicativa.

HTTP Status Code 403 (FORBIDDEN) em caso de atingir o limite de cadastro do plano.

### Listagem de Estudantes (S08)
Rota: GET /api/students

Query Params: pesquisa geral - nome, cpf e email

- Response:

[
  {
    "id": 1,
    "name": "Estudante 1",
    "email": "estudante1@example.com"
  },
  {
    "id": 2,
    "name": "Estudante 2",
    "email": "estudante2@example.com"
  }
]
Status Codes:

HTTP Status Code 200 (OK), com a lista de estudantes ordenada pelo nome.
Deleção de Estudante (S09)
Rota: DELETE /api/students/:id

Status Codes:

HTTP Status Code 204 (NO CONTENT) em caso de sucesso.

HTTP Status Code 403 (FORBIDDEN) em caso do estudante não pertencer ao usuário autenticado.

HTTP Status Code 404 (NOT FOUND) em caso do estudante não existir.

### Atualização de Estudante (S10)
Rota: PUT /api/students/:id

-Requisição:

{
  "name": "Estudante Atualizado",
  "email": "atualizado@example.com"
}
- Resposta:

HTTP Status Code 200 (OK) em caso de sucesso.

### Cadastro de Treinos (S11)
Rota: POST /api/workouts

- Requisição:

{
  "student_id": 1,
  "exercise_id": 1,
  "repetitions": 10,
  "weight": 20.5,
  "break_time": 60,
  "day": "SEGUNDA",
  "observations": "Treino intenso",
  "time": 60
}
- Resposta:

HTTP Status Code 201 (CREATED) em caso de sucesso, com os detalhes do treino.

HTTP Status Code 400 (Bad Request) em caso de dados inválidos, informando mensagem de erro explicativa.

HTTP Status Code 409 (Conflict) em caso de exercício já cadastrado para o mesmo dia.

### Listagem de Treinos do Estudante (S12)
Rota: GET /api/students/:id/workouts

- Response:

{
  "QUARTA": [
    {
      "id": 13,
      "student_id": 7,
      "exercise_id": 17,
      "repetitions": 10,
      "weight": "50.00",
      "break_time": 60,
      "day": "QUARTA",
      "observations": "Treino leve",
      "time": 30,
      "created_at": "2023-12-29T01:09:10.000000Z",
      "updated_at": "2023-12-29T01:09:10.000000Z"
    }
  ],
  "TERÇA": []
}
Status Codes:

HTTP Status Code 200 (OK), com a lista de treinos do estudante separada por dia da semana.

### Listagem de um Estudante (S13)
Rota: GET /api/students/:id

- Response:

{
  "id": 1,
  "name": "Estudante 1",
  "email": "estudante1@example.com",
  "date_birth": "1995-05-15",
  "cpf": "123.456.789-09",
  "contact": "123456789",
  "plan_id": 1,
  "city": "Cidade",
  "neighborhood": "Bairro",
  "number": "123",
  "street": "Rua",
  "state": "SP",
  "cep": "12345-678"
}
Status Codes:

HTTP Status Code 200 (OK), com os dados do estudante e endereço.
Exportação de PDF (S14)
Rota: GET /api/students/export?id_do_estudante=:id

Status Codes:

HTTP Status Code 200 (OK), com o PDF dos treinos do estudante. O PDF contém o nome do estudante e detalha o treino em formato de lista.

## Melhorias Futuras
- Implementação de middleware para tratamento de exceções.
- Aprimoramento da estrutura de diretórios.
- Adição de mais testes automatizados.
- Integração de front-end para uma experiência completa.
- Melhorias na segurança, como HTTPS e validação adicional.
- Documentação expandida e mais detalhada.

Sinta-se à vontade para explorar, contribuir e sugerir melhorias para o projeto Time Chamber!
