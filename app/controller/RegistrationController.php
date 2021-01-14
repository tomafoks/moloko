<?php
class RegistrationController extends Controller
{
    function render()
    {
        $this->f3->set('title', $this->_switch($this->f3->get('PARAMS.arg')));
        //рендерим в view
        $this->f3->set('view', 'template/registration.htm');
        echo \Template::instance()->render('layoutView.htm');
    }

    function addUser()
    {
        $newUser = $this->f3->get('POST');
        if (
            empty($newUser['nameuser']) or empty($newUser['lastnameuser']) or
            empty($newUser['password']) or empty($newUser['passwordConfirm'])
        )
            $this->f3->reroute('/registration/1');
        else {
            if ($newUser['password'] !== $newUser['passwordConfirm'])
                $this->f3->reroute('/registration/2');
            else {
                $user = new SigninModel($this->db);
                $param = $this->f3->get('POST');
                if ($user->addNewUser($param))
                    $this->f3->reroute('/registration/3');
                else
                    $this->f3->reroute('/registration/4');
            }
        }
    }

    private function _switch($arg)
    {
        switch ($arg) {
            case '1':
                return 'Заполните все поля';
            case '2':
                return 'Пароли не совпадают';
            case '3':
                return 'Спасибо за регистрацию!';
            case '4':
                return 'Ошибка в БД';
            default:
                return 'Регистрация';
        }
    }
}
