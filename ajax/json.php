<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Json</title>
        <script type="text/javascript" src="../jQuery/jQuery/jquery-3.1.1.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $("select[name='country']").bind("change", function() {
                    $("select[name='city']").empty();    //очистка поля с выбором города что бы они не стакались
                    //отправка гет-запроса
                            //куда
                                                //что- {имя_перем: значение_переменной, имя_перем: значение_переменной} - отправляеться в виде ассоциативного массива
                                                                                            //действие с ответом
                    $.get("countryCheck.php", {country: $("select[name='country']").val()}, function(data){
                        data = JSON.parse(data);    //перевод РНР асоц.массива в JS асоц.массив
                        for(var id in data){        //JS цикл for_each
                            $("select[name='city']").append($("<option value='"+ id +"'>"+ data[id] +"</option>"));    //вывод данных в HTML окно
                        }
                    });
                });
            });
        </script>

    </head>
    <body>
        <div>
            <label>Set your county:</label>
            <select name="country">
                <option value="0" selected="selected"></option>
                <option value="1">Africa</option>
                <option value="2">France</option>
            </select>
            <label>Set city:</label>
            <select name="city">
                <option value="0"></option>
            </select>
        </div>
    </body>
</html>
