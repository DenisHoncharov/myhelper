<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Ajax</title>
        <script type="text/javascript" src="../jQuery/jQuery/jquery-3.1.1.min.js"></script>
        <script type="text/javascript">
            function funcBefore() {
                $("#information").text("Waiting data"); //тоже что и html только распознает html теги
            }

            function funcSuccess(data) {
                $("#information").text(data); //вывод обработанных данных
            }

            $(document).ready(function() {
                $("#load").bind("click", function () {
                    var num = 5;
                    //вызов функции ajax
                    $.ajax({            //начало ajax кода
                        url: "content.php",    //на какой адресс
                        type: "POST",          //каким методом
                        data: ({name: "admin", number: num}),     //что передать
                        dataType: "html",              //как будет кодироваться текст
                        beforeSend: funcBefore,        //(необяз)что будет выполняться пока идет запрос
                        success: funcSuccess           //что будет выполняться когда пришел ответ
                    });
                });
                $("#done").bind("click", function () {
                    $.ajax({
                        url: "check.php",
                        type: "POST",
                        data: ({name: $("#name").val()}), //name = значению из поля name
                        dataType: "html",
                        beforeSend: funcBefore,
                        success: function(data){
                            if(data == "FAIL"){
                                alert("You can't use this name");
                            }else{
                                $("#information").text(data); //вывод обработанных данных
                            }
                        }
                    });
                });
            });
        </script>

    </head>
    <body>
        <div>
            <input type="text" id="name" placeholder="Put your name">
            <input type="button" id="done" value="Success">
            <p id="load" style="cursor:pointer;">Download data</p>
            <div id="information"></div>
        </div>
    </body>
</html>
