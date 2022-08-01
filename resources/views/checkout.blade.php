@extends('layouts.front')

@section('content')
<style>

#right {
  position: relative;
  width: calc(60% - 40px);
  height: 100%;
  top: 20;
  left: 10%;
  display: flex;
  flex-flow: column nowrap;
  padding-left: 20px;
}

#right form {
  display: flex;
  flex-flow: column nowrap;
  width: 100%;
}

#right form input,
#right form select {
  -moz-appearance: none;
  /* Firefox */
  -webkit-appearance: none;
  /* Safari and Chrome */
  appearance: none;
  border: none;
  border-bottom: 1.5px solid #ccc;
  padding: 5px;
  margin-top: 2.5px;
  position: relative;
}

#right form .form-field {
  display: flex;
  flex-flow: column nowrap;
  justify-content: center;
  margin-bottom: 12.5px;
}

#right form #date-val {
  display: flex;
  justify-content: space-between;
}

#right form #date-val select {
  width: 45%;
}

#right form button[type=submit] {
  background: linear-gradient(135deg, #4183d7 0%, #66cc99 100%);
  padding: 5px;
  border: none;
  border-radius: 50px;
  color: white;
  font-weight: 400;
  font-size: 12pt;
  margin-top: 10px;
}

#right form button[type=submit]:hover {
  background: transparent;
  box-shadow: 0 0 0 3px #4183d7;
  color: #4183d7;
}


</style>

<div class="container">

<section id="right">
		<h1>Cartão de Credito</h1>
		<form action="#">
			<div id="form-card" class="form-field">
				<label for="cc-number">Número do cartão:</label>
				<input id="cc-number" maxlength="19" name="card_number" placeholder="1111 2222 3333 4444" required>
			</div>

			<div id="form-date" class="form-field">
				<label for="expiry-month">Data de Expiração</label>
				<div id="date-val">
					<select id="expiry-month" required name="card_month">
															<option id="trans-label_month" value="" default="default" selected="selected">Mês</option>
															<option value="1">01</option>
															<option value="2">02</option>
															<option value="3">03</option>
															<option value="4">04</option>
															<option value="5">05</option>
															<option value="6">06</option>
															<option value="7">07</option>
															<option value="8">08</option>
															<option value="9">09</option>
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>
													</select>
					<select id="expiry-year" required name="card_year">
															<option id="trans-label_year" value="" default="" selected="selected">Ano</option>

                                                    <option value="2022">22</option>
                                                    <option value="2023">23</option>
                                                    <option value="2024">24</option>
                                                    <option value="2025">25</option>
                                                    <option value="2026">26</option>
                                                    <option value="2027">27</option>
                                                    <option value="2028">28</option>
                                                    <option value="2029">29</option>
                                                    <option value="2030">30</option>
                                                    <option value="2031">31</option>
                                                    <option value="2032">32</option>

                                                </select>
				</div>
			</div>

			<div id="form-sec-code" class="form-field">
				<label for="sec-code">Código de Segurança:</label>
				<input type="password" maxlength="3" name="card_cvv" placeholder="123" required>
			</div>

			<button type="submit">Efetuar Pagamento</button>
		</form>
	</section>
</div>

@endsection
@section('scripts')
<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
    <script src="{{asset('assets/js/jquery.ajax.js')}}"></script>
    <script>
        const sessionId = '{{session()->get('pagseguro_session_code')}}';
        PagSeguroDirectPayment.setSessionId(sessionId);
    </script>

    <script>
        let cardNumber = document.querySelector('input[name=card_number]');
        cardNumber.addEventListener('keyup', function(){
            if(cardNumber.value.length >= 6 ){
                PagSeguroDirectPayment.getBrand({
                    cardBin: cardNumber.value.substr(0, 6),
                    success: function(res){
                        console.log(res);
                    },
                    error: function(err){
                        console.log(err);
                    },
                    complete: function(res){
                        console.log('Complete: '+ res);
                    }
                });
            }
        });
    </script>
@endsection


