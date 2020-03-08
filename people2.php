<html>
 <head>
  <title>Бейдж положить на выдачу</title>

  <link href="css/my.css" rel="stylesheet">
  <script src="jquery-3.4.1.min.js"></script>
  <link href="css/bootstrap.css" rel="stylesheet">
  <script src="js/bootstrap.min.js"></script>
  <meta charset="utf-8">
 </head>
 <body>
   <div class="main">
     <div class="submain2">
       <div class="row">
         <div class="col-3">
       <a href="http://localhost/"><button class="btn btn-primary btn-lg">перейти на главный экран</button></a>
       Сканируйте бейдж или введите код оператора
     </div>
     <div class="col-5">
       <form name="form" action= "getContentFromUrl4.php" method="post" >
       <input id=subject2 type="text" maxlength=20  name="subject2"   placeholder="Номер бейджа" autofocus class="input" /><br />
       <input type="hidden" name="zakaz" id="order">
       <input type="hidden" name="polka" id="polka1"> <br>

       <div class="knopki">

        <input type="button" class="fbutton btn-primary" name="1" value="1" id="1" onClick=addNumber(this); />
        <input type="button" class="fbutton btn-primary" name="2" value="2" id="2" onClick=addNumber(this); />
        <input type="button" class="fbutton btn-primary" name="3" value="3" id="3" onClick=addNumber(this); />
        <br>
        <input type="button" class="fbutton btn-primary" name="4" value="4" id="4" onClick=addNumber(this); />
        <input type="button" class="fbutton btn-primary" name="5" value="5" id="5" onClick=addNumber(this); />
        <input type="button" class="fbutton btn-primary" name="6" value="6" id="6" onClick=addNumber(this); />
        <br>
        <input type="button" class="fbutton btn-primary" name="7" value="7" id="7" onClick=addNumber(this); />
        <input type="button" class="fbutton btn-primary" name="8" value="8" id="8" onClick=addNumber(this); />
        <input type="button" class="fbutton btn-primary" name="9" value="9" id="9" onClick=addNumber(this); />
        <br>
        <input type="button" class="fbutton btn-primary" name="0" value="0" id="hide" onClick=addNumber(this); />
        <input type="button" class="fbutton btn-primary" name="0" value="0" id="0" onClick=addNumber(this); />
        <input type="button" class="fbutton btn-primary" name="0" value="←" id="del" onClick=remNumber(this); />
        <input type="submit"  class="btn btn-primary" id="sub" value="готов к выдаче" disabled>
        </form>

       </div>

     </div>
     <div class="col">
       <img src="img/badge.png">
     </div>
   </div>
  </div>

<script>

$("#subject2").focus();
 $( document ).ready(function() {
	var input = $( "#subject2" ), timeOut;
	input.on( 'keyup', function () {
  	clearTimeout( timeOut );
    timeOut = setTimeout( myfunc, 500, $( this ).val() );
  });
  input.on( 'keydown', function () {
    clearTimeout( timeOut );
	});
  function myfunc( value ) {
    $('#sub').prop('disabled', false);
     $('#sub').trigger("click");
 	}
});


function addNumber(element){
  if((document.getElementById('subject2').value).length>5) {

    document.getElementById('subject2').value = "";
   $('#sub').trigger("click");


  }
  else {
   document.getElementById('subject2').value = document.getElementById('subject2').value+element.value;
 $('#sub').prop('disabled', false);

}
    if((document.getElementById('subject2').value).length>5) { //ограничение на 20 полок
     document.getElementById('subject2').value = "";
     $('#sub').prop('disabled', false);
  }
}
function remNumber(element) {

document.getElementById('subject2').value = (document.getElementById('subject2').value).slice(0,-1);
}

 var s = document.location.href;
 var path = s.split("?value=",6)[1] ;

 path=path.substr(0,6);
 document.getElementById('order').value = path;
 var s2 = document.location.href;
 var polka = s2.split("?polka=",)[1] ;
 document.getElementById('polka1').value = polka;

 
</script>

</body>

</html>
