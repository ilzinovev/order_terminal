<html>
 <head>
  <title>Отдать заказ</title>
  <link href="css/my.css" rel="stylesheet">
  <script src="jquery-3.4.1.min.js"></script>
  <link href="css/bootstrap.css" rel="stylesheet">
  <script src="js/bootstrap.min.js"></script>
  <meta charset="utf-8">
</head>
<body>
 <div class="main">
  <div class="submain">
   <br>
   <p> Сумма заказа</p>
   <div id="content_div"></div>
   <p> Сумма оплаты</p>
   <div id="content_div2"></div>
   <div id="content_div3"></div>
   <div id="content_div4"></div>
   <form action="index.php">
   <button type="submit" id="close">Кнопка-ссылка</button>
   </form>
  </div>
 </div>

<script>
$('#close').hide();
function ajaxGetXML(){
    $.ajax({
        type: "GET",
        url: "file.xml" ,
        crossDomain: true,
        dataType: "xml",
        success: function(data) {
            var html = "";
            var html2= "";
            var polk= "";
            var stat= "";
            $(data).find('status').each(function(){
             var status = $(this).find('status').html();
             stat += status;
             stat=stat.replace('undefined','');
             stat=stat.replace(new RegExp("\\r?\\n", "g"), "");
             stat=stat.replace("<!--Статус-->", "");
             });
            $(data).find('cost').each(function(){
             var status = $(this).find('with_discount').html();
             html += status;
             });
            $(data).find('cost').each(function(){
             var status2 = $(this).find('payd').html();
             html2 += status2;
             });
             $(data).find('properties').each(function(){
             var st = $(this).find('storage_name').html();
             polk += st;
             });
            $(data).find('properties').each(function(){
             var order = $(this).find('order_code').html();
             order=order.replace('undefined','');
             order=order.replace(new RegExp("\\r?\\n", "g"), "");
             order=order.replace("<!--код заказа-->", "");
             url="people.php?value=" + order;
            });
            $('#content_div').html("<p>"+html+"</p>");
            $('#content_div2').html("<p>"+html2+"</p>");
            var cost1=document.getElementById("content_div").textContent;
            var cost2=document.getElementById("content_div2").textContent;
            if(stat.includes('Закрыт')) {
             $('#but').hide();
             $('#content_div4').html("Заказ уже закрыт!");
            $('#close').trigger("click");
            }
            if (cost1 == cost2) {
             $('#content_div3').html("<p>"+"Заказ оплачен!"+"</p>");
              var explode = function(){
                document.location.href =url ;
             };
              setTimeout(explode, 1500);
             }
            else {
             $('#content_div3').html("<p>"+"Проблема с оплатой, обратитесь на кассу!<br>Местоположение<br>"+polk+"</p>");
               var explode = function(){
                document.location.href = "index.php";
              };
               setTimeout(explode, 5000);
             }
        },
        // если произошла ошибка при получении файла
        error: function(){
          document.location.href = "index.php";
        }

    });
}

ajaxGetXML();

</script>

</body>
</html>
