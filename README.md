# Sistema de Upload e Garga de Base de Dados
<section style="margin-top: 60px;">
  <img src="https://i.imgur.com/mAizoEs.png" />
  <p>Sistema destina-se a ler e popular a base de Dados através de arquivos txt, utilizando tabulação como separador de campos</p>
  <p>Optei por usar o Sqlite, por ser nativo do laravel e tratar-se de um banco relacional.<p>
</section>

<section style="margin-top: 20px;">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white">
  <img src="https://img.shields.io/badge/Docker-2CA5E0?style=for-the-badge&logo=docker&logoColor=white">
  <img src="https://img.shields.io/badge/Nginx-009639?style=for-the-badge&logo=nginx&logoColor=white">
  <img src="https://img.shields.io/badge/Sqlite-00000F?style=for-the-badge&logo=sqlite&logoColor=white">
  <img src="https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=shields">
</section>
<section style="margin-top: 60px;">
  <h1> Docker: Nginx, PHP (Laravel) e Sqlite. </h1>
  <p>Com o Docker Compose, executar os containers Nginx e PHP.</p>
  <p>O objetivo deste guia é dar alguma referência rápida para configurar o servidor na máquina local</p>
</section>

<section style="padding: 10px; margin-top: 20px;">
  <h2>Visão geral</h2>
  <ol>
      <li value="1">
        <p><a href="#prerequisites">Pré-requisitos de instalação</a></p>
        <p>Antes de fazer qualquer coisa, instale todos os pré-requisitos.</p>
      </li>
      <li>
        <p><a href="#dic-tree">Árvore de diretórios</a></p>
        <p>Criando o ambiente do projeto</p>
      </li>
      <li>
        <p><a href="#clone">Clone o projeto</a></p>
        <p>Navegue até a pasta file-upload-app e execute os comandos do git</p>
      </li>
      <li>
        <p><a href="#docker-commands">Comandos Docker.</a></p>
        <p>Comandos para configurar o ambiente</p>
      </li>      
  </ol>
</section>
<hr>
<section id="pré-requisitos" style="padding: 10px;">
  <h2> Pré-requisitos de instalação </h2>
  <p>Este ambiente foi criado no Windows, mas todas as coisas do docker funcionarão em qualquer SO. Basta seguir as instruções de instalação na documentação:</p>
  <ul>
    <li><a href="https://docs.docker.com/engine/install/">Docker</a></li>
    <li><a href="https://docs.docker.com/compose/install/">Docker Compose</a></li>
    <li><a href="https://learn.microsoft.com/pt-br/windows/wsl/install" target="_blank">Instale o wls2</a></li>
  </ul>
  <p>Verifique se todas as dependências estão instaladas inserindo os seguintes comandos em seu terminal:</p>
  <pré>
    docker-compose
    docker -v
  </pre>
</section>
<hr>
<br>

<section id="clone" style="padding: 10px;">
  <h2>Clone o projeto</h2>
  <p>Execute o git bash</p>
  <p>Navegue até o seu diretório raiz, onde ficara o projeto e execute o comando abaixo:</p>
    
  ```
    git clone git@github.com:aldenirgil/app-upload-file.git
  ```

  <p>Aguarde a conclusão do git, através do terminal, acesse a a pasta do projeto e dentro dela execute os comandos:</p>
  
  ```
    docker-compose build
    docker-compose up -d
  ```

  <p>Aguarde o termino do processo, e crie a pasta <pre>.env</pre></p>
  <p>Pelo terminal, use o comomando: </p>
  
  ```
    cp .env.example .env
  ```
  
  <p>Para esse sistema, abra o <pre>.env</pre> e edite o as linhas refetes ao banco de dados. coloque:</p>
  
  ```
    DB_CONNECTION=sqlite
    # DB_HOST=127.0.0.1
    # DB_PORT=3306
    # DB_DATABASE=laravel
    # DB_USERNAME=root
    # DB_PASSWORD=
  ```
  
  <p>Salve e retorne ao terminal wsl. Acesse a imagem do sistema.</p>
  
    ```
        docker-compose restart
    ```

  <p>Acesse a imagem do sistema através do comando: </p>
      ```
        docker exec -it <nome-da-imagem> /bin/bash
      ```
  <p>Na sequencia digite, </p>
      ```
        composer update
      ```
    <p>Para recriar a pasta vendor e o autoload e pronto. O sistema está pronto para uso.<br>
    Verifique <a href="http://localhost:8080/">localhost</a> em seu navegador.</p> 
  
</section>
<hr>
<br>

