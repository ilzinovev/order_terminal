<html>
 <head>
  <title>Полка</title>
  <link href="css/my.css" rel="stylesheet">
  <script src="jquery-3.4.1.min.js"></script>
  <link href="css/bootstrap.css" rel="stylesheet">
  <script src="js/bootstrap.min.js"></script>
  <meta http-equiv="refresh" content="2;url=http://localhost/index.php" />
  <meta charset="utf-8">
 </head>
 <body>
  <div class="main">
   <div class="submain">
    <br>
    <p> Местоположение</p>
    <div id="content_div"></div>
    <div id="content_div2"></div>
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
            var stat= "";
            $(data).find('properties').each(function(){
            var status = $(this).find('storage_name').html();
            html += status;
            });
            $('#content_div').html("<p>"+html+"</p>");
              if(html.includes('Полка')) {
              }
              else {
                $('#content_div2').html("<p>"+'Полка не указана'+"</p>");
              }
      },
       error: function(){
           document.location.href = "inde1x.php";
        }
    });
}
ajaxGetXML();
function expode(){
  document.location.href = "inde1x.php";
}
</script>

</body>
</html>
