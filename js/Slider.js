var image1 = new Image()
image1.src = "images/slider/image1.JPG"

var image2 = new Image()
image2.src = "images/slider/image2.gif"

var image3 = new Image()
image3.src = "images/slider/image3.gif"

var image4 = new Image()
image4.src = "images/slider/image4.gif"

var image5 = new Image()
image5.src = "images/slider/image5.JPG"

var image6 = new Image()
image6.src = "images/slider/image6.gif"

var image7 = new Image()
image7.src = "images/slider/image7.jpg"

var image8 = new Image()
image8.src = "images/slider/image8.png"

var step = 1

function slideit() {

    document.images.slide.src = eval("image" + step + ".src")
    if (step < 8) {
        step++
    }
    else {
        step = 1
    }
    setTimeout("slideit()", 6000)
}
slideit()