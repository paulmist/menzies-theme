// Function to handle scroll event and toggle button visibility
function toggleScrollToTopButton() {
  // Define the scroll offset at which the button should appear
  const scrollOffsetToShowButton = 100; // Adjust this value as needed

  // Select the scroll-to-top <a> tag
  const scrollToTopButton = document.querySelector('a.scrollToTopBtn');

  // Check the screen width before showing or hiding the button
  if (window.innerWidth <= 1239) {
    if (scrollToTopButton) {
      // Check if the scroll position is greater than or equal to the offset
      if (window.scrollY >= scrollOffsetToShowButton) {
        // If it is, display the button
        scrollToTopButton.style.display = 'block';
      } else {
        // If it's not, hide the button
        scrollToTopButton.style.display = 'none';
      }
    }
  } else {
    // Hide the button if the screen width is greater than 1239px
    if (scrollToTopButton) {
      scrollToTopButton.style.display = 'none';
    }
  }
}

// Function to scroll to the top of the page with smooth animation
function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: 'smooth', // Add this line for smooth scrolling animation
  });
}

// Add an event listener to the window's scroll event
window.addEventListener('scroll', toggleScrollToTopButton);

// Add a click event listener to the scroll-to-top button
const scrollToTopButton = document.querySelector('a.scrollToTopBtn');
if (scrollToTopButton) {
  scrollToTopButton.addEventListener('click', scrollToTop);
}
