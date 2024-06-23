    <?php
    session_start();

    class Usuario
    {
        private $conn;

        public function __construct($conn)
        {
            $this->conn = $conn;
        }

        public function login($email, $senha)
        {
            try {
                $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
                $stmt->bindValue(":email", $email);
                $stmt->bindValue(":senha", $senha);
                $stmt->execute();

                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                if (!$usuario) {
                    header('Location: login.php?message=Usuário ou senha inválidos.');
                    exit();
                }

                $_SESSION['usuarios'] = [
                    'id' => $usuario['id'],
                    'nome' => $usuario['nome'],
                    'tipo' => $usuario['tipo'],
                ];
                if ($_SESSION['usuarios']['tipo'] == 'ADMIN') {
                    header('location: pagina_adm.php');
                    echo "<script>alert('ADM Logado com sucesso!')</script>";
                }

                if ($_SESSION['usuarios']['tipo'] == 'USUARIO') {
                    header('location: index.php');
                    echo "<script>alert('Usuario Logado com sucesso!')</script>";
                }
                exit();
            } catch (PDOException $error) {
                echo "Erro ao executar a consulta: " . $error->getMessage();
                return false;
            }
        }
    }
