let menu = document.querySelector("#menu-btn");
let navbar = document.querySelector(".navbar");

menu.onclick = () => {
    menu.classList.toggle("fa-times");
    navbar.classList.toggle("active");
};

window.onscroll = () => {
    menu.classList.remove("fa-times");
    navbar.classList.remove("active");
};

document.querySelectorAll(".image-slider img").forEach((images) => {
    images.onclick = () => {
        var src = images.getAttribute("src");
        document.querySelector(".main-home-image").src = src;
    };
});

var swiper = new Swiper(".review-slider", {
    spaceBetween: 20,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    loop: true,
    grabCursor: true,
    autoplay: {
        delay: 7500,
        disableOnInteraction: false,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
    },
});

// JavaScript for modal functionality
const modal = document.getElementById("myModal");
const openModalBtn = document.getElementById("openModalBtn");
const cartItems = document.getElementById("cartItems");
const closeModalBtn = document.getElementById('closeModal');

openModalBtn.addEventListener("click", () => {
    modal.style.display = "block";
});

// Close modal (both buttons)
closeModalBtn.addEventListener('click', () => {
    modal.style.display = 'none';
});

document.addEventListener('click', (e) => {
    // Close modal when clicking outside the modal content
    if (e.target === modal) {
        modal.style.display = 'none';
    }
});

function addToCart() {
    // Get product details from input fields
    const productName = document.querySelector('[name="product_name"]').value;
    const productSize = document.querySelector('[name="product_size"]').value;
    const productQuantity = document.querySelector('[name="product_quantity"]').value;

    // Create a new table row for the cart
    const row = document.createElement("tr");
    row.innerHTML = `
        <td>${productName}</td>
        <td>${productSize}</td>
        <td>${productQuantity}</td>
    `;

    // Add the row to the cart
    cartItems.appendChild(row);
}

function checkout() {
    // Implement your checkout logic here
    alert("Checkout functionality to be implemented.");
}
