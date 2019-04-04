<?php namespace OctoClub\Tutorial\Components;

use Mail;
use Input;
use Flash;
use Cms\Classes\ComponentBase;

class Feedback extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Feedback Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
            'email' => [
                'title'       => 'Email',
                'description' => 'Данный email будет использоваться для отправки всех заявок с формы.',
                'default'     => 'admin@test.ru',
                'required'    => true,
            ],
        ];
    }

    public function onSend()
    {
        // Проверка
        if(!Input::has('name')){
            Flash::error('Вы должны указать свое имя');
            return;
        }
    
        if(!Input::has('email')){
            Flash::error('Вы должны указать email для связи');
            return;
        }
    
        // Составление массива
        $data = [
            'name'       => e(Input::get('name')),
            'email'      => e(Input::get('email')),
            'item_name'  => e(Input::get('item_name')),
        ];
    
        if(Input::has('phone')){
            $data['phone'] = e(Input::get('phone'));
        }
    
        // Отправка уведомления
        $email = $this->property('email');
        Mail::send('octoclub.tutorial::mail.feedback', $data, function($message) use ($email) {
            $message->to($email, 'Admin Person');
        });
        Flash::success('Форма успешно отправлена.');
    }
}
