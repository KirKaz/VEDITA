// AJAX запрос на изменение данных БД и скрытие строки товара
function hide (selector)
{
    var elemList = document.querySelectorAll(selector);
    [].forEach.call(elemList, function (item)
    {
        item.addEventListener('click', function () //функция, которая прячет строку товара
        {
            var hide = item.id;
            if (hide != null && hide != ''){
                document.getElementById(hide).onclick = function()
                {
                    document.getElementById(hide).hidden = true
                };
                $.ajax
                ({
                    type: 'POST',
                    url:"hide.php",
                    data: {
                        do_hide: 'do_hide',
                        id: hide
                    },
                    success:function(response)
                    {
                        if(response.trim()=="success")
                        {
                            alert('Товар скрыт');
                        }
                    }
                });
            }
        });
    });
}
hide('button');
