// AJAX запрос на увеличение количества товара в БД
function plusfunc (selector)
{
    var elemList = document.querySelectorAll(selector);
    [].forEach.call(elemList, function (item)
    {
        item.addEventListener('click', function ()
        {
            var plus = item.name;
            var cl = item.className;
            if (plus != null && plus != '') {
                if (cl == 'plus')
                {
                    $.ajax
                    ({
                        type: 'POST',
                        url:"plus.php",
                        data: {
                            do_plus: 'do_plus',
                            id: plus
                        },
                    });
                }

            }

        });
    });
}
plusfunc('button');