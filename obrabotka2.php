<html>
 <head>
  <title>Положить на выдачу</title>
  <link href="css/my.css" rel="stylesheet">
  <script src="jquery-3.4.1.min.js"></script>
  <link href="css/bootstrap.css" rel="stylesheet">
  <script src="js/bootstrap.min.js"></script>
  <meta charset="utf-8">
 </head>
 <body>
   <div class="main">
     <div class="submain2">
       <div class="container">
         <div class="row">
           <div class="col-2"><a href="http://localhost/"><button class="btn btn-primary btn-lg">перейти на главный экран</button></a>
             Отсканируйте или введите номер полки
             <br>
             <button id="bez" class="btn btn-warning btn-lg">без номера полки</button>
          </div>
           <div class="col"><div class="knopki">
            <input id=mvar type="text" maxlength=9  name="mvar"   placeholder="Номер полки" class="input" /><br />
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
           </div>
         </div>
         <div class="col">
          <div id="strr">
            <p id="dva"> Номер заказа </p>
            <div id="content_div"></div>
            <p id="dva">Статус заказа</p>
            <div id="content_div2"></div>
            <p id="dva">Менеджер</p>
            <div id="content_div3"></div>
            <p id="dva">Сумма заказа</p>
            <div id="content_div4"></div>
         </div>
       </div>
      </div>
     </div>
     <div id="content_div5"></div>
      <button id="but" class=" btn btn-primary btnmain" disabled> Далее </button>
 </div>
</div>

<script>
$( document ).ready(function() {
	var input = $( '#mvar' ), timeOut;
	input.on( 'keyup', function () {
  	clearTimeout( timeOut );
    timeOut = setTimeout( myfunc, 1500, $( this ).val() );
  });
  input.on( 'keydown', function () {
    clearTimeout( timeOut );
	});
  function myfunc( value ) {
    var elem = document.getElementById("mvar").value;
    if(elem.length==9) {
      elem=elem;
      document.location.href = url+elem;
    }
    if(elem.length==1) {
     elem="00000000"+elem;
     document.location.href = url+elem;
    }
   if(elem.length==2) {
     elem="0000000"+elem;
     document.location.href = url+elem;
    }

   }
});
$("#mvar").focus();
function addNumber(element){
  if((document.getElementById('mvar').value).length>9) {
    document.getElementById('mvar').value = "";
    $('#but').prop('disabled', true);
  }
  else {
   document.getElementById('mvar').value = document.getElementById('mvar').value+element.value;
  $('#but').prop('disabled', false);

}
    if((document.getElementById('mvar').value).length>9) { //ограничение на 20 полок
     document.getElementById('mvar').value = "";
   $('#but').prop('disabled', false);
  }
}

function remNumber(element) {

document.getElementById('mvar').value = (document.getElementById('mvar').value).slice(0,-1);
}

function ajaxGetXML(){
    $.ajax({
        type: "GET",
        url: "file.xml" ,
        crossDomain: true,
        dataType: "xml",
        success: function(data) {
            var html = "";
            var html2= "";
            var html3= "";
            var html4= "";
            $(data).find('properties').each(function(){
             var status = $(this).find('number').html();
             html += status;
             var status = $(this).find('manager').html();
             html3 += status;
            });
            $(data).find('cost').each(function(){
             var status = $(this).find('with_discount').html();
             html4 += status;
            });
            $(data).find('status').each(function(){
             var status = $(this).find('status').html();
             html2 += status;
             html2=html2.replace('undefined','');
             html2=html2.replace(new RegExp("\\r?\\n", "g"), "");
             html2=html2.replace("<!--Статус-->", "");
            });
            $(data).find('properties').each(function(){
             var order = $(this).find('order_code').html();
             order=order.replace('undefined','');
             order=order.replace(new RegExp("\\r?\\n", "g"), "");
             order=order.replace("<!--код заказа-->", "");
             var getNum = document.getElementById('mvar').value;
             url="people2.php?value=" + order+"?polka=";
             url2="people3.php?value=" + order;
            });
            $('#content_div').html("<p id=dva>"+html+"</p>");
            $('#content_div2').html("<p id=dva>"+html2+"</p>");
            $('#content_div3').html("<p id=dva>"+html3+"</p>");
            $('#content_div4').html("<p id=dva>"+html4+"</p>");
            $('#content_div5').html("");
            function skryto(){
             $('#but').hide();
             $('#frm').hide();
             $('#content_div').hide();
             $('#content_div2').hide();
             $('#content_div3').hide();
             $('#content_div4').hide();
             $('#strr').hide();
             $('#dva').hide();
             $('#dva').hide();
             $('#str').hide();
           };

           if(html2.includes('Закрыт')) {
             skryto();
             $('#content_div5').html("<p>"+"Заказ уже закрыт!"+"</p>");
             $('#bute').hide();
             var explode = function(){
             document.location.href = "index.php";
            };
             setTimeout(explode, 3000);
           }
           if(html2.includes('Готов к выдаче')) {
             skryto();
             $('#content_div').hide();
             $('#content_div2').hide();
             $('#content_div3').hide();
             $('#content_div4').hide();
             $('#content_div5').html("<p>"+"Заказ уже готов к выдаче!"+"</p>");
             var explode = function(){
                     document.location.href = "index.php";
            };
             setTimeout(explode, 3000);//возврат на главный экран

           }
           if(html2.includes('Готов к закрытию')) {
             skryto();
             $('#content_div5').html("<p>"+"Заказ имеет статус Готов к закрытию!"+"</p>");
               $('#bute').hide();
             var explode = function(){
                     document.location.href = "index.php";
            };
             setTimeout(explode, 3000);
           }
        },
        error: function(){
            document.location.href = "index.php";
        }

    });
}


$("#but").click(function(){
 var elem = document.getElementById("mvar").value;
 if(elem.length==9) {

   document.location.href = url+elem;
 }
 if(elem.length==1) {
  elem="00000000"+elem;
  document.location.href = url+elem;
 }
if(elem.length==2) {
  elem="0000000"+elem;
  document.location.href = url+elem;
 }
 if(elem.length==0) {

   document.location.href = url2;
  }






});
$("#bez").click(function(){
document.location.href = url2;
});
ajaxGetXML();


</script>

</body>
</html>
