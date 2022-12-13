<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <script type="text/javascript" src="JS/efeitos.js"></script>
    <title>Projeto Faculdade 5 Semestre</title>
</head>
<body>
    <header>
        <div class="itens_header">
            <div id="logo">
                <img src="Imagens/logo.jpg" width="250" height="150">
            </div>
            <div id="links">
                <nav>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="galeria.html">Galeria</a></li>
                        <li><a href="agendamentos.html">Agendamentos</a></li>
                        <li><a href="contatos.html">Contatos</a></li>
                        <li><a href="localizacao.html">Localização</a></li>
                        <li><a href="videos.html">Videos</a></li>
                        <li><a href="administracao.html">administração</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
		<section>
			<div>
				<?php
					include 'banco.php'; //Conexão ao banco
					
					//Dados da página em HTML
					$nome_usuario = $_POST['nome_usuario'];
					$senha_usuario = $_POST['senha_usuario'];
					$funcao_usuario = $_POST['funcao_usuario'];
					
					$executa = "insert into funcionario (nome, senha, cargo) values ('$nome_usuario','$senha_usuario','$funcao_usuario')";
					$query = $mysqli->query($executa);
						
					echo "Funcionário cadastrado com sucesso!!!";
					echo "<a href='index.html'>Voltar</a>";
				?>
			</div>
		</section>
	</main>
</body>
</html>