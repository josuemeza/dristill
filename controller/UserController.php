<?php
	include('DatabaseAccess.php');

	class UserController {

		private $root = '../';
		private $dbAccess;

		public function __construct(){
			$this->dbAccess = new DatabaseAccess();
		}

		public function request($post) {
			switch($post['action']) {
				case 'registro': 
					$this->addUser($post['run_input'], $post['correo'], $post['password']);
					break;
				case 'editar':
					$this->editUser($post['correo-actual'], $post['run_input'], $post['correo'], $post['password']);
					break;
				case 'validarCorreo':
					$this->invalidMail($post['mail']);
					break;
				case 'login':
					$this->login($post['mail'], $post['password']);
					break;
				case 'logout':
					$this->logout();
					break;
			}
		}

		private function addUser($run, $mail, $password) {
			$result = $this->dbAccess->insert('Usuario', array('rut', 'Email', 'Contrasena'), array("'".$run."'", "'".$mail."'", "'".$password."'"));
			if($result) {
				header('Location: ../views/registro-completo.php');
			} else {
				header('Location: ../views/registro-error.php');
			}
		}

		private function editUser($lastMail, $run, $mail, $password) {
			$result = $this->dbAccess->update('Usuario', "rut='" . $run . "', Email='" . $mail . "', Contrasena='" . $password . "'", "Email='" . $lastMail . "'");
			if($result) {
				$result = $this->dbAccess->select('Usuario', array('rut'), "Email='" . $mail . "' AND Contrasena='" . $password . "'");
				if($result['rows_count']==1) {
					session_start();
					$_SESSION['loguser'] = array(
						'rut' => $result['rows'][0]['rut'],
						'mail' => $mail
					);
					header('Location: ../views/perfil.php');
				} else {
					header('Location: ../views/editar-error.php');
				}
			} else {
				header('Location: ../views/editar-error.php');
			}
		}

		private function invalidMail($mail) {
			$result = $this->dbAccess->select('Usuario', array('rut'), "Email='" . $mail . "';");
			if($result['rows_count']==1) echo "invalid";
			else echo "valid";
		}

		private function login($mail, $password) {
			$result = $this->dbAccess->select('Usuario', array('rut'), "Email='" . $mail . "' AND Contrasena='" . $password . "'");
			if($result['rows_count']==1) {
				session_start();
				$_SESSION['loguser'] = array(
					'rut' => $result['rows'][0]['rut'],
					'mail' => $mail
				);
				header('Location: ../views/index.php');
			} else {
				header('Location: ../views/login-error.php');
			}
		}

		private function logout() {
			session_start();
			$_SESSION = array();
			if (ini_get("session.use_cookies")) {
			    $params = session_get_cookie_params();
			    setcookie(session_name(), '', time() - 42000,
			        $params["path"], $params["domain"],
			        $params["secure"], $params["httponly"]
			    );
			}
			session_destroy();
			header('Location: ../views/logout.php');
		}

	}

	(new UserController())->request($_POST);
?>