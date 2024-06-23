<?php
require 'conn/conexao.php';
include 'auth/autenticar.php';


$query = "SELECT id, imagem, titulo, conteudo FROM artigos;";
$stmt = $conn->query($query);
$stmt->execute();


$query = "SELECT id, titulo_jogo, imagem_jogo, data_jogo, descricao_jogo, iframe_url FROM
 jogos;";
$jogo = $conn->query($query);
$jogo->execute();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet" />
  <link href="css/boot.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/fonticon.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/slide.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <script src="js/slide.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <title>EDUC JOGOS</title>
</head>

<body>
  <?php if ($isUsuarioLogado) : ?>
    <script>
      Swal.fire('Logado com sucesso!', 'Bem-vindo, <?php echo $_GET['usuarios']['nome']; ?>!', 'success');
    </script>
  <?php endif; ?>


  <!--INICIO DOBRA CABEÇALHO-->
  <?php include 'inc/menu-adm.php'; ?>
  <!--FIM DOBRA CABEÇALHO-->

  <!-- INICIO SLIDE -->
  <section class="slider">
    <div class="slider-content">

      <input type="radio" name="btn-radio" id="radio1">
      <input type="radio" name="btn-radio" id="radio2">
      <input type="radio" name="btn-radio" id="radio3">

      <div class="slide-box primeiro">
        <img class="img-desktop" src="img/bg_main_home.png" alt="slide1">
      </div>

      <div class="slide-box">
        <img class="img-desktop" src="img/bg_main_home2.png" alt="slide2">
      </div>

      <div class="slide-box">
        <img class="img-desktop" src="img/bg_main_home3.png" alt="slide3">
      </div>

      <div class="nav-auto">
        <div class="auto-btn1"></div>
        <div class="auto-btn2"></div>
        <div class="auto-btn3"></div>
      </div>

      <div class="nav-manual">
        <label for="radio1" class="manual-btn"></label>
        <label for="radio2" class="manual-btn"></label>
        <label for="radio3" class="manual-btn"></label>
      </div>

    </div>
  </section>
  <!-- FIM SLIDE -->

  <!--INICIO SESSÃO DE ARTIGOS-->
  <section class="main_blog" id="artigos">
    <header class="main_blog_header">
      <h1 class="icon-pen">Sessão de Artigos</h1>
      <p>
        Aqui você encontra os artigos mais relevantes. <br>
        Notícias, informações, tudo o que você precisa.
      </p>
    </header>
    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
      <article>
        <a href="exibir_artigo.php?id=<?php echo $row['id'] ?>">
          <img src="img/<?php echo basename($row['imagem']); ?>" width="200px" height="200px" alt="Imagem do Artigo">
        </a>
        <h2>
          <a href="exibir_artigo.php?id=<?php echo $row['id'] ?>" class="title">
            <?php
            // Verifica se o conteúdo possui mais de 100 caracteres
            if (strlen($row['conteudo']) > 200) {
              echo substr($row['conteudo'], 0, 156) . '...';
            } else {
              echo $row['conteudo'];
            }
            ?>
          </a>
        </h2>
      </article>
    <?php } ?>

  </section>
  <!--FIM SESSÃO SESSÃO DE ARTIGOS-->

  <!-- INICIO SESSÃO DOBRA CURSOS-->
  <section class="main_course">
    <header class="main_course_header">
      <img src="img/logo3.png" alt="img" title="Logo EDUC JOGOS" />
      <h1 class="icon-books">Jogar também é aprender</h1>
      <p>
        Os jogos podem ser uma janela para outras culturas, histórias e línguas, permitindo que os jogadores ampliem
        seus horizontes de uma maneira envolvente. Seja desvendando enigmas complexos, construindo mundos virtuais ou
        competindo em um jogo de equipe, o aprendizado é uma constante.
      </p>
    </header>
    <div class="main_course_content">
      <article>
        <header>
          <h2>Matemática</h2>
          <p>
            Podem ajudar a visualizar conceitos abstratos, resolver problemas de maneira prática e aplicar suas
            habilidades matemáticas em contextos do mundo real. Jogos que envolvem quebra-cabeças, que exigem raciocínio
            lógico e resolução de problemas, podem melhorar a compreensão sobre conceitos matemáticos, como geometria,
            álgebra e aritmética.
          </p>
        </header>
      </article>
      <article>
        <header>
          <h2>Ciências</h2>
          <p>
            Podem ajudar a compreender processos científicos, como a digestão humana, o ciclo da água e os fenômenos
            naturais, através de simulações realistas e interativas. Além disso, os jogos podem incentivar a curiosidade
            e o pensamento crítico, fundamentais para o avanço na área das ciências.
          </p>
        </header>
      </article>
      <article>
        <header>
          <h2>Línguas Portuguesa, Estrangeiras e Sinais</h2>
          <p>
            Podem melhorar leitura, escrita, compreensão auditiva e expressão oral em português e línguas estrangeiras com jogos de palavras, vocabulário e gramática. Jogos de linguagem de sinais são úteis para alunos surdos e para sensibilizar ouvintes sobre comunicação inclusiva e diversidade linguística.
          </p>
        </header>
      </article>
      <article>
        <header>
          <h2>História</h2>
          <p>
            Podem transportar para diferentes épocas, explorando eventos, personalidades e culturas históricas de forma interativa. Jogos de simulação histórica, que desafiam a tomar decisões e enfrentar dilemas, ajudam a compreender melhor os contextos e eventos passados.
          </p>
        </header>
      </article>
      <article>
        <header>
          <h2>Educação Ambiental</h2>
          <p>
            Sensibilizar para questões ambientais e promover a conservação do meio ambiente. Jogos de sustentabilidade simulam práticas ambientais e desafiam a encontrar soluções para problemas ambientais, ajudando a entender as interações humanas com o meio ambiente. Eles podem inspirar ações positivas e incentivar comportamentos sustentáveis no dia a dia.
          </p>
        </header>
      </article>
      <article>
        <header>
          <h2>Informática</h2>
          <p>
            Podem ensinar conceitos de informática e tecnologia de maneira prática e divertida. Jogos que envolvem
            programação, design de jogos, segurança cibernética e habilidades de computação podem ajudar a desenvolver
            habilidades digitais essenciais para o mundo moderno.
          </p>
        </header>
      </article>
    </div>
    <!-- FIM SESSÃO DOBRA  CURSOS-->

    <!-- INICIO SESSÃO JOGOS -->
    <section class="main_games" id="jogos">
      <header class="main_games_header">
        <h1 class="icon-keyboard">Sessão de Jogos</h1>
        <p>
          Disponibilizamos aqui alguns exemplos de jogos. <br>
          Selecione algum deles para poder jogar, aprender e se divertir.
        </p>
      </header>

      <?php while ($row = $jogo->fetch(PDO::FETCH_ASSOC)) { ?>
        <article>
          <a href="exibir_jogo.php?id=<?php echo $row['id'] ?>">
            <img src="img/<?php echo basename($row['imagem_jogo']); ?>" width="200px" height="200px" alt="Imagem do Jogo" />
          </a>
          <h2>
            <a href="exibir_jogo.php?id=<?php echo $row['id'] ?>" class="title">
              <?php
              // Verifica se o conteúdo possui mais de 100 caracteres
              if (strlen($row['descricao_jogo']) > 200) {
                echo substr($row['descricao_jogo'], 0, 156) . '...';
              } else {
                echo $row['descricao_jogo'];
              }
              ?>
            </a>
          </h2>
        </article>
      <?php } ?>
    </section>
    <!-- FIM SESSÃO JOGOS -->

    <!-- INICIO DOBRA TUTOR -->
    <section class="main_tutor" id="sobre">
      <div class="main_tutor_content">
        <header>
          <h1>Conheça um pouco mais sobre nós</h1>
          <p>Estudantes da Escola Técnica de Ceilândia-DF</p>
        </header>
        <div class="main_tutor_content_img">
          <img src="img/devs_icon.png" width="200" title="Instrutor" alt="Instrutor" />
        </div>
        <article class="main_tutor_content_history">
          <header>
            <h2>Dois estudantes de T.I mergulhando no oceano da tecnologia, <br>
              com intuito de fomentar a utilização de jogos na educação.</h2>
          </header>
          <p>
            "Se a educação sozinha não transforma a sociedade, sem ela tampouco a sociedade muda."<br><br>
            Paulo Freire.
          </p>
        </article>

        <!-- REDES SOCIAIS -->
        <section class="main_tutor_social_network">
          <header>
            <h2>Nossas redes sociais</h2>
          </header>

          <article>
            <header>
              <h3><a href="#" class="icon-facebook">Facebook</a></h3>
            </header>
          </article>

          <article>
            <header>
              <h3><a href="#" class="icon-linkedin">Linkedin</a></h3>
            </header>
          </article>

          <article>
            <header>
              <h3><a href="#" class="icon-instagram">Instagram</a></h3>
            </header>
          </article>

          <article>
            <header>
              <h3><a href="#" class="icon-twitter">Twitter/X</a></h3>
            </header>
          </article>
        </section>
        <!-- FIM REDES SOCIAIS -->
      </div>
    </section>
    <!-- FIM DOBRA TUTOR -->

    <!-- INICIO DOBRA RODAPÉ -->
    <footer class="main_footer_rights">
      <p>&copy; 2024 ETC - Todos os direitos reservados.</p>
    </footer>
    <!-- FIM DOBRA RODAPÉ -->
</body>

</html>