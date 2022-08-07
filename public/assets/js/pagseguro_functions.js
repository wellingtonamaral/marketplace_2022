function proccessPayment(token){
    let data = {
      card_token: token,
      hash: getHash(),
      installments: document.querySelector('.select_installments').value,
      _token: '{{csrf_token()}}'
    };
      $.ajax({
          type: 'POST',
          url: '{{route("checkout.proccess")}}',
          data: data,
          dataType: 'json',
          success: function(res){
              console.log(res);


          }
      });
  }

  function getInstallments(amount, brand){
    PagSeguroDirectPayment.getInstallments({
      amount: amount,
      brand: brand,
      maxInstallmentNoInterest: 0,
      success: function(res){
          let selectInstallments = drawSelectInstallments(res.installments[brand]);
          document.querySelector('div.installments').innerHTML  = selectInstallments;
        //console.log(res);
      },
      error: function(res){

      },
      complete: function(res){

      },
    })
  }

  function drawSelectInstallments(installments) {
    let select = '<label>Opções de Parcelamento:</label>';

    select += '<select class="form-control select_installments">';

    for(let l of installments) {
        select += `<option value="${l.quantity}|${l.installmentAmount}">${l.quantity}x de ${l.installmentAmount} - Total fica ${l.totalAmount}</option>`;
    }


    select += '</select>';

    return select;
}
