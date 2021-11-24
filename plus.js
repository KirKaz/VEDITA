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
            var name_id = 'input'+plus;
            if (plus != null && plus != '') {
                if (cl == 'plus')
                {
                    var val = parseInt(document.getElementById(name_id).value);
                    document.getElementById(name_id).value = val + 1;
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