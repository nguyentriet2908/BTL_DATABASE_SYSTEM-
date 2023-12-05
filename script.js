document.getElementById('productForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var productName = document.getElementById('productName').value;
    var color = document.getElementById('color').value;
    var size = document.getElementById('size').value;
    var price = document.getElementById('price').value;

    // Do something with the data (e.g., send it to a server or display it)
    console.log('Product Name:', productName);
    console.log('Color:', color);
    console.log('Size:', size);
    console.log('Price:', price);
});

document.getElementById('addProduct').addEventListener('click', function() {
    alert('Adding product...');
});

document.getElementById('deleteProduct').addEventListener('click', function() {
    alert('Deleting product...');
});

document.getElementById('checkStatus').addEventListener('click', function() {
    alert('Checking product status...');
});

