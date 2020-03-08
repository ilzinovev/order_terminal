<html>
 <head>
  <title>Скан</title>
  <script src="jquery-3.4.1.min.js"></script>
  <link href="css/my.css" rel="stylesheet">
  <link href="css/bootstrap.css" rel="stylesheet">
  <script src="js/bootstrap.min.js"></script>
  <meta charset="utf-8">
 </head>
<body>
  <div class="main">
   <div class="submain">
<a href="http://localhost/"><button class="btn btn-primary btn-lg">перейти на главный экран</button></a>
    <p> Отсканируйте штрих-код заказа </p>
    <img src="img/barcode.png">
    <form name="form" action="getContentFromUrl2.php" method="post" >
    <input type="text" name="subject" id="subject" autofocus>
    <input type="submit" id="sub"></input>
    </form>
  <a href="rukami2.php"><img src="img/ruka.png"></a>
   </div>
  </div>
<script>
$('#sub').hide();
$("#subject").focus();
$( document ).ready(function() {
	var input = $( '#subject' ), timeOut;
	input.on( 'keyup', function () {
  	clearTimeout( timeOut );
    timeOut = setTimeout( myfunc, 500, $( this ).val() );
  });
  input.on( 'keydown', function () {
    clearTimeout( timeOut );
	});
  function myfunc( value ) {
     $('#sub').trigger("click");
 	}
});
</script>
</body>

</html>
