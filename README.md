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

<section id="clone" style="padding: 10px;">
  <h2>Clone o projeto</h2>
  <p>Uma maneira simples e rápida de obter esse ambiente é clonar meu projeto em um diretório, abrir seu terminal, navegar até o diretório clonado do projeto e escrever alguns comandos:</p>
  
  ```
    docker-compose build
    docker-compose up -d
  ```

  <p>Verifique <a href="http://localhost:80">localhost</a> em seu navegador e voilá</p>
  <h3>Portas usadas no projeto:</h3>

  ```
    http -> 80
    https -> 443
    php -> 9000
    mysql -> 3306    
  ```
  </section>
<hr>

<section id="dic-tree" style="padding: 10px;">
  <h2>Árvore de diretórios</h2>
  <p>Antes de começarmos a configurar nosso ambiente, crie sua arvore de diretório seguindo exatamente a mesma estrutura abaixo.</p>
  <p><strong>OBSERVAÇÃO:</strong> considerar "workspace" seu diretorio de trabalho. O importante é que dentro do seu diretório de trabalho, você siga a estrutura abaixo".
  <h3>Minha árvore de projetos:</h3>
  <pre>
    \- --workspace<br>
        +---file-upload-app<br>
          | docker-compose.yml<br>
          | Dockerfile<br>
          +---docker<br>
          | +---nginx<br>
          |
  </pre>
</section>
<hr>



<section id="test-db" style="padding: 10px;">
  <h2>Executando e testando nosso projeto.</h2>
  <p>Com tudo configurado, vamos dar vida ao nosso ambiente.</p>
  <p>No diretório <code>/environmentProject/</code>, construa todas as imagens com:</p>
  <pré>
    compilação docker-compose
  </pre>
  <p>Quando terminar, vamos executar todos os contêineres com:</p>
  <pré>
    docker-composer up -d
  </pre>
  <p>Entre no seu <a href="https://localhost">localhost</a> e voilá!</p>
  <p>Com tudo funcionando, você pode testar sua conexão MySql navegando para <a href="http://localhost/index.php">localhost/index.php</a>. Se tudo estiver bem, você receberá uma mensagem de sucesso.</p>
  <p>Para o teste laravel, você precisará editar <code>/example-app/.env</code> e definir sua conexão com o mysql. Exemplo:</p>
  <pré>
    DB_CONNECTION=mysql
    DB_HOST=db
    DB_PORT=3306
    DB_DATABASE=test_db
    DB_USERNAME=deusuario
    DB_PASSWORD=devpass
  </pre>
  <p>Salvar e executar os seguintes comandos:</p>
  <pré>
    docker exec (container_id) composer dump-autoload
    docker exec (container_id) php artesão migrar
  </pre>
  <p>Se você não receber nenhuma mensagem de erro, sua conexão está correta e você está pronto para codificar.</p>
</section>