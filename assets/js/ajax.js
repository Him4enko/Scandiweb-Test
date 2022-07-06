$(document).ready(function (e) {
    $("#form").submit(function (e) { // Устанавливаем событие отправки для формы с id=form
        e.preventDefault();
        var form_data = $(this).serialize(); // Собираем все данные из формы
        $("#parent > div input:checked").parent().remove();
        $.ajax({
            type: "POST", // Метод отправки
            cache: false,
            url: "index.php", // Путь до php файла отправителя
            data: form_data,
            success: function () {


            }
        });
    });
});    