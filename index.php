<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>Банкомат</title>
  <script src="js/jquery-3.5.1.js"></script>
  <script src="js/main.js"></script>
  <style>
    tr {
      text-align: center;
    }
  </style>
 </head>
 <body>

 <form action="/atm/php/server.php" type="POST">
  <p><h1>Банкомат</h1></p>
  <p><b>Номинал в наличии</b></p>
  <p><input type="text" id="in_cash" name="in_cash" size="30" maxlength="30" placeholder="5, 10, 20, 50, 100, 200, 500"></p>
  <p><b>Ваша сумма</b></p>
  <p><input type="text" id="our_cash" name="our_cash" size="30" maxlength="30" placeholder="100" required></p>
  <p><input type="submit"></p>
 </form>
 <div>
   <p>Ответ:</p>
   <p id="answer_err"></p>
   <table id="table_denomination" style="width:30%">
     <thead>
     <tr>
       <th>Номинал</th>
       <th>Количество</th>
     </tr>
   </thead>
   <tbody>
   </tbody>
</table>
 </div>

 </body>
</html>
