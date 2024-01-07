<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Slideshow Modal Gallery</title>
</head>
<body>

  <!-- Slideshow Container -->
  <div class="slideshow-container">
    <div class="mySlides">
      <img src="img/Psq2.png" alt="Slide 1">
    </div>
    <div class="mySlides">
      <img src="img/Psq3.png" alt="Slide 2">
    </div>
    <div class="mySlides">
      <img src="img/Psq4.png" alt="Slide 3">
    </div>

    <!-- Navigation buttons -->
    <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
    <a class="next" onclick="changeSlide(1)">&#10095;</a>
  </div>

  <!-- Modal Container -->
  <div id="myModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <img class="modal-content" id="modalImage">
  </div>
</body>
</html>
