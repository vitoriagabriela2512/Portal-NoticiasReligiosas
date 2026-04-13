# Portal-NoticiasReligiosas
# 📰 Consciência News

## 📌 Sobre o Projeto

O **Consciência News** é um portal de notícias desenvolvido com foco em conteúdos relacionados à **religião, espiritualidade, cultura e atualidades**. O sistema permite que usuários visualizem notícias e que autores cadastrados possam gerenciar conteúdos de forma simples e eficiente.

---

## Layout:(algumas imagens)
<img width="1331" height="621" alt="image" src="https://github.com/user-attachments/assets/fc9f6ebe-7d09-4e25-8e2c-20707d03e975" />
<img width="1345" height="638" alt="image" src="https://github.com/user-attachments/assets/ba123fe5-2636-4f61-9438-6b15af59cd01" />
<img width="1348" height="630" alt="image" src="https://github.com/user-attachments/assets/da3d7ac7-c3cd-4937-86f7-9d9412bc615a" />




## 🎯 Objetivo

O objetivo do projeto é:

* Informar de forma clara e acessível
* Promover respeito entre diferentes crenças
* Desenvolver habilidades em **PHP, HTML, CSS e JavaScript**
* Criar um sistema funcional com autenticação e gerenciamento de conteúdo

---

## 🚀 Funcionalidades

### 👤 Usuários

* Cadastro de usuário
* Login com sessão
* Persistência com cookies
* Diferenciação de tipo de usuário:

  * Autor (admin simples)
  * Leitor

---

### 📝 Notícias

* Visualização de notícias (público geral)
* Listagem por categorias:

  * Brasil
  * Mundo
  * Astrologia
* Exibição de notícias recentes (vindas do banco de dados)
* Página individual de notícia

---

### ✍️ Painel do Autor (Dashboard)

* Criar nova notícia
* Editar notícia
* Excluir notícia
* Visualizar apenas suas próprias notícias

---

### ⚙️ Conta do Usuário

* Editar nome e e-mail
* Excluir conta
* Logout do sistema

---

### 🌤️ Funcionalidades Extras

* Sistema de previsão do tempo por cidade
* Descoberta de signo por data de nascimento
* Barra de busca de notícias
* Modo escuro (Dark Mode)

---

## 🛠️ Tecnologias Utilizadas

### Front-end:

* HTML5
* CSS3 (com design moderno e responsivo)
* JavaScript (interações e funcionalidades dinâmicas)

### Back-end:

* PHP
* MySQL (banco de dados)

---

## 🗂️ Estrutura do Projeto

```
/projeto
│
├── index.php
├── login.php
├── cadastro.php
├── dashboard.php
├── nova_noticia.php
├── editar_noticia.php
├── excluir_noticia.php
├── editar_usuario.php
├── excluir_usuario.php
├── noticia.php
│
├── conexao.php
├── verifica_login.php
│
├── style.css
├── script.js
│
├── imagens/
```

---

## 🔐 Sistema de Autenticação

O sistema utiliza:

* **Sessões (`$_SESSION`)** para manter o login
* **Cookies** para reconectar o usuário automaticamente

Controle de acesso:

```php
if($_SESSION['tipo'] != 'autor'){
    die("Acesso permitido apenas para autores");
}
```

---

## 🗄️ Banco de Dados

### Tabela: `usuarios`

| Campo | Tipo    |
| ----- | ------- |
| id    | INT     |
| nome  | VARCHAR |
| email | VARCHAR |
| senha | VARCHAR |
| tipo  | VARCHAR |

---

### Tabela: `noticias`

| Campo   | Tipo     |
| ------- | -------- |
| id      | INT      |
| titulo  | VARCHAR  |
| noticia | TEXT     |
| imagem  | VARCHAR  |
| autor   | INT      |
| data    | DATETIME |

---

## 🎨 Design

* Cores principais: preto, branco e dourado
* Layout moderno com **cards**
* Imagens padronizadas
* Responsivo (funciona em celular)
* Animações suaves

---

## 🌙 Modo Escuro

O projeto possui suporte a modo escuro:

```css
body.dark {
    background: #1a1a1a;
    color: #eee;
}
```

---

## ▶️ Como Executar o Projeto

### 1. Instalar servidor local

* XAMPP / WAMP / Laragon

### 2. Colocar o projeto na pasta:

```
htdocs/
```

### 3. Criar banco de dados no phpMyAdmin

### 4. Importar as tabelas

### 5. Configurar conexão:

```php
$conn = mysqli_connect("localhost","root","","seu_banco");
```

### 6. Iniciar servidor

### 7. Acessar no navegador:

```
http://localhost/seu_projeto
```

---

## ⚠️ Observações

* Apenas usuários do tipo **autor** podem acessar o painel
* Imagens das notícias são armazenadas por caminho
* Sistema simples, ideal para aprendizado

---

## 💡 Melhorias Futuras

* Upload real de imagens
* Sistema de comentários
* Likes nas notícias
* Filtros e categorias avançadas
* Painel administrativo completo
* Paginação de notícias

---

## 👩‍💻 Desenvolvido por

**Vitória Gabriela Fernandes da Luz**

---

## 📄 Licença

Este projeto é para fins educacionais.
