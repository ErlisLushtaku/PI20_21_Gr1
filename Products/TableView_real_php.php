<?php
    $host = '127.0.0.1';
    $db_username = 'root';
    $db_password = '1249348089';
    $dbname = 'users';
    $DBconnection = mysqli_connect($host, $db_username, $db_password, $dbname);

    $categories = array('art', 'culture', 'foods');
    foreach ($categories as $category) {
        ${$category."_query"} = "SELECT * FROM products WHERE category='$category'";
        $result = mysqli_query($DBconnection, ${$category."_query"});
        ${$category."_products"} = $result->fetch_all(MYSQLI_ASSOC);
    }    
    
?>
<script type="text/javascript" src="DisplayProducts.js"></script>
<script>

var artProducts = <?php echo json_encode($art_products) ?>;
var cultureProducts = <?php echo json_encode($culture_products) ?>;
var foodProducts = <?php echo json_encode($foods_products) ?>;
var ids = ["#art-container","#food-container","#textile-container"];
var Products = [artProducts,cultureProducts,cultureProducts];
display_Products(Products,ids);

</script>

<script>
function CartProd(title, quantity, price) {
    Product.call(this, title, price);
    this.quantity = quantity;
}

var cart = JSON.parse(sessionStorage.getItem('cart'));

$.each(cart, function (index, item) {
    $("#cartList").append(
        $("<button>")
            .attr("id", "btn" + index)
            .click(function () { removeItem("btn" + index) })
            .append($("<i>").attr("class", "fas fa-times")),
        $("<dt>").text(item.title),
        $("<dd>").text(item.quantity).attr('class', 'inline'),
        $("<dd>").text(item.price)
    )
});
calcTotal();

function passCart() {
    const cart = []

    var cartList = document.getElementById("cartList");
    var titles = cartList.getElementsByTagName("dt");
    var quantities_prices = cartList.getElementsByTagName("dd");

    var ddIndex = 0;
    for (let i = 0; i < titles.length; i++) {
        var product = new CartProd(titles[i].innerHTML, quantities_prices[ddIndex].innerHTML, quantities_prices[ddIndex + 1].innerHTML);
        cart.push(product);
        ddIndex += 2;
    }

    sessionStorage.setItem('cart', JSON.stringify(cart));
}

function removeItem(elementId) {
    $("#" + elementId).next().remove();
    $("#" + elementId).next().remove();
    $("#" + elementId).next().remove();
    $("#" + elementId).remove();
    calcTotal();
}

function calcQuantity(title, price) {
    var cartList = document.getElementById("cartList").getElementsByTagName("dt");

    for (let i = 0; i < cartList.length; i++) {
        if (cartList[i].innerHTML == title) {

            let quantity = cartList[i].nextElementSibling;
            quantity.innerHTML = 'x' + (parseInt(quantity.innerHTML.substring(1)) + 1).toString();

            let newPrice = quantity.nextElementSibling;
            newPrice.innerHTML = (parseFloat(price.slice(0, -1)) * parseInt(quantity.innerHTML.substring(1))).toFixed(2) + '\u20ac';

            break;
        }
    }
};

function exists(title) {
    var cartList = document.getElementById("cartList").getElementsByTagName("dt");

    for (let i = 0; i < cartList.length; i++) {
        if (cartList[i].innerHTML == title) {
            return true;
        }
    }

    return false;
};

function calcTotal() {
    var cartList = document.getElementById("cartList").getElementsByTagName("dd");
    var total = 0;

    for (let i = 0; i < cartList.length; i++) {
        if (i % 2 == 1) {
            total += parseFloat(cartList[i].innerHTML.slice(0, -1))
        }
    }

    document.getElementById("totalPrice").innerHTML = total.toFixed(2).toString() + "\u20ac"
};

window.onbeforeunload = function () {
    passCart();
};
</script>