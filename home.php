<?php
    include "header.php";
?>
    <main>

      <div class="slider-container">
       
        <div class="slider">
            <div class="slide">
                <img src="images/slide3.jpg" alt="Slide 1">
                <div class="slide-content">
                   <h2 class="slider-heading">Pick The Best Toy Your Toys for Your Kids</h2>
                   
                    <a href="#" class="read-more">Read More</a>
                </div>
            </div>

            <div class="slide">
                <img src="images/slide2.jpg" alt="Slide 2">
                <div class="slide-content">
                   <h2 class="slider-heading">Pick Your Toys for Your Kids accourding to your kids age </h2>
                   
                    <a href="#" class="read-more">Read More</a>
                </div>
            </div>
            <div class="slide">
                <img src="images/slide1.jpg" alt="Slide 3">
                <div class="slide-content">
                   <h2 class="slider-heading">Pick Your Best Toys for Your Kids Birthday </h2>
                   
                    <a href="#" class="read-more">Read More</a>
                </div>
            </div>
        </div>
            <button class="prev">❮</button>
            <button class="next">❯</button>
         </div>
         <script src="script.js"></script>

    </main>
<br>
<br>

<section>
     <h2 class="shop-by-heading">Shop by Age</h2> 
      <div class="shop-by">
         <button class="prev">❮</button>
           <div class="item-container"> 
            <div class="item1">
                <img src="images/slider1/0-18months.jpg" alt="item 1">
                <div class="shopby-content">
                    <a href="#" class="shop-now-cat"></a>
                </div>
            </div>
            <div class="item2">
                <img src="images/slider1/18-36months.jpg" alt="item 2">
                <div class="shopby-content">
                    <a href="#" class="shop-now-cat"></a>
                </div>
            </div> 
            <div class="item3">
                <img src="images/slider1/3-5years.jpg" alt="item 3">
                <div class="shopby-content">
                    <a href="#" class="shop-now-cat"></a>
                </div>
            </div>
            <div class="item4">
                <img src="images/slider1/5-7years.jpg" alt="item 4">
                <div class="shopby-content">
                    <a href="#" class="shop-now-cat"></a>
                </div>
            </div>
           
            <div class="item5">
                <img src="images/slider1/7-9years.jpg" alt="item 6">
                <div class="shopby-content">
                    <a href="#" class="shop-now-cat"></a>
                </div>
            </div>
            <div class="item6">
                <img src="images/slider1/9-12 years.jpg" alt="item 7">
                <div class="shopby-content">
                    <a href="#" class="shop-now-cat"></a>
                </div>
            </div>
            <div class="item7">
                <img src="images/slider1/12years.jpg" alt="item 8">
                <div class="shopby-content">
                    <a href="#" class="shop-now-cat"></a>
                </div>
            </div>
        </div>
        <button class="next">❯</button>
    </div>
</section>

<script>
// script
document.addEventListener('DOMContentLoaded', () => {
    const container = document.querySelector('.item-container');
    const items = document.querySelectorAll('.item-container > div');
    const totalItems = items.length;
    const itemWidth = items[0].clientWidth + parseInt(getComputedStyle(items[0]).marginRight);
    const itemsToShow = 4;
    let currentIndex = 0;

    // Function to update the carousel position
    function updateCarousel() {
        const offset = -currentIndex * itemWidth;
        container.style.transform = `translateX(${offset}px)`;
    }

    // Event listeners for navigation arrows
    document.querySelector('.shop-by .next').addEventListener('click', () => {
        if (currentIndex < totalItems - itemsToShow) {
            currentIndex++;
            updateCarousel();
        }
    });

    document.querySelector('.shop-by .prev').addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    });

    // Initial call to set correct position
    updateCarousel();
});



</script>

<?php
    include "footer.php";
?>