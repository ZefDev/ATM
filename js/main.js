$(window).on('load', function() {
  $('form').submit(function(e) {
    var $form = $(this);
    $.ajax({
      type: $form.attr('type'),
      url: $form.attr('action'),
      data: { in_cash: $("#in_cash").val(), our_cash: $("#our_cash").val() }
    }).done(function(result) {
      alert(result);
      var dd = JSON.parse(result);
      if (dd.answer == true) {
        $("#answer_err").text("");
        $('#table_denomination tr:not(:first)').remove();
        $.each(dd.array_denomination,function(index,value){
          $('#table_denomination tr:last').after('<tr><td>'+ index +'</td><td>'+value+'</td></tr>');
        });
      }
      else{
        $('#table_denomination tr:not(:first)').remove();
        $("#answer_err").text(dd.text_error);
      }
    }).fail(function() {
      console.log('fail');
    });
    //отмена действия по умолчанию для кнопки submit
    e.preventDefault();
  });
});
