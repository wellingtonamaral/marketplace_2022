<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index() {
        //session()->forget('pagseguro_session_code');

        if(!auth()->check()) {
            return redirect('login');
        }
        $this->makePagSeguroSession();

        $cartItems = array_map(function($line) {
            return $line['amount'] * $line['price'];
        },session()->get('cart'));

        $cartItems = array_sum($cartItems);

        //dd($cartItems);
        //var_dump(session()->get('pagseguro_session_code'));

        return view('checkout',compact('cartItems'));
    }

    public function proccess(Request $request){

        $dataPost = $request->all();

        $reference = 'XPTO';

        $creditCard = new \PagSeguro\Domains\Requests\DirectPayment\CreditCard();
        $creditCard->setReceiverEmail(env('PAGSEGURO_EMAIL'));
        $creditCard->setReference($reference);
        $creditCard->setCurrency("BRL");
        $carItems = session()->get('cart');

        foreach($carItems as $item) {
            $creditCard->addItems()->withParameters(
                $reference,
                $item['name'],
                $item['amount'],
                $item['price']
            );
        }

        $user= auth()->user();
        $email = env('PAGSEGURO_ENV') == 'sandbox'? 'test@sandbox.pagseguro.com.br': $user->email;

        $creditCard->setSender()->setName($user->name);
        $creditCard->setSender()->setEmail($email);
        $creditCard->setSender()->setPhone()->withParameters(
            11,
            56273440
        );

        $creditCard->setSender()->setDocument()->withParameters(
            'CPF',
            '00791321894'
        );

        $creditCard->setSender()->setHash($dataPost['hash']);

        $creditCard->setSender()->setIp('127.0.0.0');

        $creditCard->setShipping()->setAddress()->withParameters(
            'Av. Brig. Faria Lima',
            '1384',
            'Jardim Paulistano',
            '01452002',
            'São Paulo',
            'SP',
            'BRA',
            'apto. 114'
        );

        $creditCard->setBilling()->setAddress()->withParameters(
            'Av. Brig. Faria Lima',
            '1384',
            'Jardim Paulistano',
            '01452002',
            'São Paulo',
            'SP',
            'BRA',
            'apto. 114'
        );

        $creditCard->setToken($dataPost['card_token']);
        list($quantity, $installmentAmount) = explode('|',$dataPost['installment']);

        $installmentAmount = number_format($installmentAmount, 2,'.','');

        $creditCard->setInstallment()->withParameters($quantity, $installmentAmount);

        $creditCard->setHolder()->setBirthdate('01/10/1979');
        $creditCard->setHolder()->setName($dataPost['card_name']);

        $creditCard->setHolder()->setPhone()->withParameters(
            11,
            56273440
        );

        $creditCard->setHolder()->setDocument()->withParameters(
            'CPF',
            '00791321894'
        );

        $creditCard->setMode('DEFAULT');

        //dd($creditCard);
        $result = $creditCard->register(
            \PagSeguro\Configuration\Configure::getAccountCredentials()
        );
        var_dump($result);
    }

    private function makePagSeguroSession() {

        if(!session()->has('pagseguro_session_code')) {
            $sessionCode = \PagSeguro\Services\Session::create(
                \PagSeguro\Configuration\Configure::getAccountCredentials()
            );
            session()->put('pagseguro_session_code',$sessionCode->getResult());
        }
    }
}
