document.getElementById('searchInput').addEventListener('input', searchProduct);

function searchProduct() {
    var input, filter, container, items, h3, i, txtValue;
    input = document.getElementById('searchInput');
    filter = input.value.toLowerCase();
    container = document.getElementById('productContainer');
    items = container.getElementsByClassName('itemLink');
    
    // Collect matching items
    var matchingItems = [];
    for (i = 0; i < items.length; i++) {
        h3 = items[i].getElementsByTagName('h3')[0];
        txtValue = h3.textContent || h3.innerText;
        if (txtValue.toLowerCase().indexOf(filter) > -1) {
            matchingItems.push(items[i]);
            items[i].style.display = "";
        } else {
            items[i].style.display = "none";
        }
    }
    
    // Move matching items to the top
    for (i = 0; i < matchingItems.length; i++) {
        container.prepend(matchingItems[i]);
    }
}
