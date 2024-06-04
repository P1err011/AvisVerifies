// Add an event listener to execute the function once the DOM is fully loaded
document.addEventListener("DOMContentLoaded", function () {
  // Select all elements with the class 'star' and store them in the constant 'stars'
  const stars = document.querySelectorAll(".star");

  // Select the element with the ID 'bareme' and store it in the constant 'ratingInput'
  const ratingInput = document.getElementById("bareme");

  // Iterate over each element in the 'stars' collection
  stars.forEach((star) => {
    // Add a 'click' event listener to each star
    star.addEventListener("click", () => {
      // Get the value of the 'data-value' attribute of the clicked star
      const value = star.getAttribute("data-value");

      // Assign this value to the 'ratingInput' element
      ratingInput.value = value;

      // Iterate over each star to update their 'selected' class
      stars.forEach((s) => {
        // If the value of the current star is less than or equal to the clicked value
        if (parseInt(s.getAttribute("data-value")) <= parseInt(value)) {
          // Add the 'selected' class to the star
          s.classList.add("selected");
        } else {
          // Otherwise, remove the 'selected' class from the star
          s.classList.remove("selected");
        }
      });
    });
  });
});
