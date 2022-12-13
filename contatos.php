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
					
					//Dados da pagina Contato.HTML
					$nome = $_POST['nome'];
					$telefone = $_POST['telefone'];
					$assunto = $_POST['assunto'];
					$mensagem = $_POST['mensagem'];
					$data = date("Y-m-d");
					
					//Insere o dado no banco
					$executa = "insert into contato (nome, telefone, assunto, mensagem, data_mensagem) values ('$nome','$telefone','$assunto','$mensagem','$data')";
					$query = $mysqli -> query($executa);
					echo "Mensagem salva com sucesso";
					echo "<a href='index.html'>Volta</a>";
				?>
			</div>
		</section>
	</main>
</body>
</html>