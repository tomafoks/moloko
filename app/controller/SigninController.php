<?php
class SigninController extends Controller
{
	function render()
	{
		//рендерим в view
		echo \Template::instance()->render('signinView.htm');
	}

	//переопределене метода beforeRoute с Controller.php
	function beforeRoute(){}

	function autorization()
	{
		$email = $this->f3->get('POST.email');
		$pass = $this->f3->get('POST.password');

		$user = new SigninModel($this->db);
		$user->getEmail($email);
		if ($user->dry()) {
			$this->f3->reroute('/login');
		}

		if (!password_verify($pass, $user->password)) {
			$this->f3->reroute('/login');
		} else {
			$this->f3->set('SESSION.user', $user->email);
			$userId = base64_encode(serialize($user->iduser));
			$this->f3->set('COOKIE.basket', $userId);
			$this->f3->reroute('/');
		}
	}

	function logout() {
		$this->f3->clear('SESSION');
		$this->f3->clear('COOKIE.basket');
		$this->f3->reroute('/');
	}
}
