function click(idCatalog) {
    
Console.log(123);
    var quantity = document.getElementById("quantity").value;
    sendAjaxInput(quantity, idCatalog, '/basket/edit');
    return false;
    // document.getElementById("test").innerHTML = "Вы набираете следующий текст: " + x;
}

function sendAjaxInput(quantity, idCatalog, url) {
    alert(idCatalog);
    $.ajax({
        url: url, //url страницы (/basket/edit)
        type: "POST", //метод отправки
        dataType: "json", //формат данных
        data: {
            id: idCatalog,
            quantity: quantity
        }
    })
}
