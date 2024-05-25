document.addEventListener("DOMContentLoaded", function() {
  const slidesTop = document.querySelector(".hotel-section .slides");
  const slideItemsTop = slidesTop.querySelectorAll(".slide");
  const navigationTop = document.querySelector(".hotel-section .navigation");
  const navigationBarsTop = navigationTop.querySelectorAll(".bar");
  const totalSlidesTop = slideItemsTop.length;
  let currentSlideTop = 0;

  const slidesBottom = document.querySelector(".suite-section .slides");
  const slideItemsBottom = slidesBottom.querySelectorAll(".slide");
  const navigationBottom = document.querySelector(".suite-section .navigation");
  const navigationBarsBottom = navigationBottom.querySelectorAll(".bar");
  const totalSlidesBottom = slideItemsBottom.length;
  let currentSlideBottom = 0;

  function goToSlideTop(index) {
    if (index < 0 || index >= totalSlidesTop) {
      return;
    }

    slidesTop.style.transform = `translateX(-${index * 100}%)`;
    navigationBarsTop[currentSlideTop].classList.remove("active");
    navigationBarsTop[index].classList.add("active");
    currentSlideTop = index;
  }

  function goToSlideBottom(index) {
    if (index < 0 || index >= totalSlidesBottom) {
      return;
    }

    slidesBottom.style.transform = `translateX(-${index * 100}%)`;
    navigationBarsBottom[currentSlideBottom].classList.remove("active");
    navigationBarsBottom[index].classList.add("active");
    currentSlideBottom = index;
  }

  function nextSlideTop() {
    const nextIndex = (currentSlideTop + 1) % totalSlidesTop;
    goToSlideTop(nextIndex);
  }

  function nextSlideBottom() {
    const nextIndex = (currentSlideBottom + 1) % totalSlidesBottom;
    goToSlideBottom(nextIndex);
  }

  function prevSlideTop() {
    const prevIndex = (currentSlideTop - 1 + totalSlidesTop) % totalSlidesTop;
    goToSlideTop(prevIndex);
  }

  function prevSlideBottom() {
    const prevIndex = (currentSlideBottom - 1 + totalSlidesBottom) % totalSlidesBottom;
    goToSlideBottom(prevIndex);
  }

  navigationTop.addEventListener("click", function(event) {
    if (event.target.classList.contains("bar")) {
      const barIndex = Array.from(navigationBarsTop).indexOf(event.target);
      goToSlideTop(barIndex);
    }
  });

  navigationBottom.addEventListener("click", function(event) {
    if (event.target.classList.contains("bar")) {
      const barIndex = Array.from(navigationBarsBottom).indexOf(event.target);
      goToSlideBottom(barIndex);
    }
  });

  setInterval(nextSlideTop, 5000);
  setInterval(nextSlideBottom, 5000);
});

// function para parecer o mapa no site
function initMap() {
  var center = { lat: -21.287879943847656, lng: -50.34693145751953 };
  var mapOptions = {
    zoom: 12,
    center: center
  };
  var map = new google.maps.Map(document.getElementById('map'), mapOptions);
  var hotelMarker = new google.maps.Marker({
    position: { lat: -21.287879943847656, lng: -50.34693145751953 },
    map: map,
    title: 'Hostel'
  });
}

google.maps.event.addDomListener(window, 'load', initMap);