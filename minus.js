// AJAX запрос на уменьшение количества товара в БД
function minusfunc (selector)
{
    var elemList = document.querySelectorAll(selector);
    [].forEach.call(elemList, function (item)
    {
        item.addEventListener('click', function ()
        {
            var minus = item.name;
            var cl = item.className;
            if (minus != null && minus != '') {
                if (cl == 'minus')
                {
                    $.ajax
                    ({
                        type: 'POST',
                        url:"minus.php",
                        data: {
                            do_minus: 'do_minus',
                            id: minus
                        },

                    });
                }

            }

        });
    });
}
minusfunc('button');