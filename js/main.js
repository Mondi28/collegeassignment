//We add an event listener, which waits for the DOM to be fully loaded before executing the function
//When everything is loaded, I want this stuff to execute using this anonymous arrow function.

document.addEventListener("DOMContentLoaded", () => {
    const rightAnimation = document.querySelector(".right-animation");


    function createCircle(color, size, delay) {
        const circle = document.createElement("div"); //<div>
        circle.classList.add("circle"); //<div class="circle"></div>
        circle.style.backgroundColor = color;
        circle.style.width = `${size}px`;
        circle.style.height = `${size}px`; 
        circle.style.animationDelay = `${delay}s`;
        circle.style.top = `${Math.random() * 50}%`; 
        circle.style.left = `${Math.random() * 90}%`; 
        //CSS properties for the circle
        return circle; //We return the created circle
    }

    // Generate multiple circles
    const colors = ["#4f9df7", "#b46ff1", "#f78f4f", "#4ff7a1"]; 
    for (let i = 0; i < 30; i++) {  //In this case, i->10->10 circle
        const color = colors[i % colors.length];
        const size = Math.random() * 40 + 20; // Random size between 20px and 60px
        const delay = Math.random() * 5; // Random delay between 0s and 5s

        //Unique properties for each circle has been set
        const circle = createCircle(color, size, delay); //We pass the properties to the function
        rightAnimation.appendChild(circle); //We append the created circle to the rightAnimation div
    }
});

function showMenu() {
    alert("Working")
}