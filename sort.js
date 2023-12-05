// Function to find maximum
function findMax() {
    let arr = document.getElementById("numberList").value.split(" ").map(Number);
    if (arr.some(isNaN)) {
        document.getElementById("result").innerHTML = "";
        document.getElementById("warning").innerHTML = "Invalid input. Please enter numeric values only and folow the format";
        return;
    }
    let max = arr[0];
    for (let i = 1; i < arr.length; i++) {
        if (arr[i] > max) {
            max = arr[i];
        }
    }
    document.getElementById("warning").innerHTML = "";
    document.getElementById("result").innerHTML = "Maximum Number: " + max ;
}

// Function to find minimum
function findMin() {
    let arr = document.getElementById("numberList").value.split(" ").map(Number);
    if (arr.some(isNaN)) {
        document.getElementById("result").innerHTML = "";
        document.getElementById("warning").innerHTML = "Invalid input. Please enter numeric values only and folow the format";
        return;
    }
    let min = arr[0];
    for (let i = 1; i < arr.length; i++) {
        if (arr[i] < min) {
            min = arr[i];
        }
    }
    document.getElementById("warning").innerHTML = "";
    document.getElementById("result").innerHTML = "Minimum Number: " + min;
}

// Function to sort from smallest to largest
function sortMinToMax() {
    let arr = document.getElementById("numberList").value.split(" ").map(Number);
    if (arr.some(isNaN)) {
        document.getElementById("result").innerHTML = "";
        document.getElementById("warning").innerHTML = "Invalid input. Please enter numeric values only and folow the format";
        return;
    }
    for (let i = 0; i < arr.length; i++) {
        for (let j = i + 1; j < arr.length; j++) {
            if (arr[i] > arr[j]) {
                let temp = arr[i];
                arr[i] = arr[j];
                arr[j] = temp;
            }
        }
    }
    document.getElementById("warning").innerHTML = "";
    document.getElementById("result").innerHTML = "Min to Max: " + arr.join(", ");
}

// Function to sort from largest to smallest
function sortMaxToMin() {
    let arr = document.getElementById("numberList").value.split(" ").map(Number);
    if (arr.some(isNaN)) {
        document.getElementById("result").innerHTML = "";
        document.getElementById("warning").innerHTML = "Invalid input. Please enter numeric values only and folow the format";
        return;
    }
    for (let i = 0; i < arr.length; i++) {
        for (let j = i + 1; j < arr.length; j++) {
            if (arr[i] < arr[j]) {
                let temp = arr[i];
                arr[i] = arr[j];
                arr[j] = temp;
            }
        }
    }
    document.getElementById("warning").innerHTML = "";
    document.getElementById("result").innerHTML = "Max to Min: " + arr.join(", ");
}
