<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
</head>
<body>
<section id="Slider">
        <div class="aspect-ratio-169">
            <img src="img/hinhnen2.jpg">
            <img src="img/hinhnen1.jpg">
            <img src="img/hinhnen3.jpg">
        </div>
        <div class="dot-container">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </section>
</body>
<script>
    const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
    const imgContainer = document.querySelector(".aspect-ratio-169")
    const dotItem = document.querySelectorAll(".dot")
    let imgNum = imgPosition.length
    let index = 0
    // console.log(imgPosition)
    imgPosition.forEach(function (image, index) {
        image.style.left = index * 100 + "%"
        dotItem[index].addEventListener('click', function () {
            slider(index)
        })
    })
    function imgSlide() {
        index++;
        if (index >= imgNum) { index = 0 }
        slider(index)

    }
    function slider(index) {
        imgContainer.style.left = "-" + index * 100 + "%"
        const dotActive = document.querySelector(".active")
        dotActive.classList.remove("active")
        dotItem[index].classList.add("active")
    }
    setInterval(imgSlide, 5000)
</script>
</html>