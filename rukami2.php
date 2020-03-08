<html>
 <head>
  <title>Ручной ввод положить на выдачу</title>
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
          введите номер заказа
        </div>
        <div class="col-5"><div class="knopki">
           <form action="getContentFromUrl6.php" method="post" name="vform" id="frm">

          <input id=mvar type="text" maxlength=20  name="mvar"   placeholder="Номер заказа" class="input" /><br />
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
          <input type="button" class="fbutton btn-primary" name="i" value="i" id="i" onClick=addNumber(this); />
          <input type="button" class="fbutton btn-primary" name="0" value="0" id="0" onClick=addNumber(this); />
          <input type="button" class="fbutton btn-primary" name="0" value="←" id="del" onClick=remNumber(this); />
          <br>
          <input type="button" class="fbutton btn-primary" name="pa" value="ПА-" id="7" onClick=addNumber(this); />
          <input type="button" class="fbutton btn-primary" name="ka" value="КА-" id="8" onClick=addNumber(this); />
          <input type="button" class="fbutton btn-primary" name="za" value="ЗА-" id="9" onClick=addNumber(this); />
        </div></div>
          <div class="col">
            <br>
            <br>
          <input type="button" class="fbutton btn-primary" name="a" value="А" id="a" onClick=addNumber(this); />
          <input type="button" class="fbutton btn-primary" name="z" value="З" id="0" onClick=addNumber(this); />
          <input type="button" class="fbutton btn-primary" name="k" value="К" id="k" onClick=addNumber(this); /> <br>
          <input type="button" class="fbutton btn-primary" name="l" value="Л" id="a" onClick=addNumber(this); />
          <input type="button" class="fbutton btn-primary" name="o" value="О" id="o" onClick=addNumber(this); />
          <input type="button" class="fbutton btn-primary" name="p" value="П" id="p" onClick=addNumber(this); /><br>
          <input type="button" class="fbutton btn-primary" name="pp" value="Р" id="r" onClick=addNumber(this); />
          <input type="button" class="fbutton btn-primary" name="С" value="С" id="s" onClick=addNumber(this); />
          <input type="button" class="fbutton btn-primary" name="Т" value="Т" id="t" onClick=addNumber(this); /><br>
            <input type="button" class="fbutton btn-primary" name="f" value="Ф" id="ch" onClick=addNumber(this); />
          <input type="button" class="fbutton btn-primary" name="Ч" value="Ч" id="ch" onClick=addNumber(this); />
          <input type="button" class="fbutton btn-primary" name="-" value="-" id="ch" onClick=addNumber(this); />
        </div>
          <br>
          <br>


          </div>
          <div class="col">
            <input type="submit"  class="btn btn-primary" value="найти заказ"></input> </form>
     </div>
   </div>
 </div>
  <div id="content_div5"></div>
 </div>
</div>

<script>
$("#mvar").focus();
function addNumber(element){
  if((document.getElementById('mvar').value).length>20) {
    document.getElementById('mvar').value = "";
  }
  else {
  document.getElementById('mvar').value = document.getElementById('mvar').value+element.value;}
  if((document.getElementById('mvar').value).length>20) { //ограничение на 6 символов
    document.getElementById('mvar').value = "";
  }
}

function remNumber(element) {

document.getElementById('mvar').value = (document.getElementById('mvar').value).slice(0,-1);
}
</script>

</body>
</html>
