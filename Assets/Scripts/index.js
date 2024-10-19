//AOS - Animation On Scroll
AOS.init();


// slider
document.addEventListener('DOMContentLoaded', () => {
  const headings = [
    "Mining Excellence",
    "Very Efficient Mining Extraction",
    "Sustainable Practices",
    "Innovative Solutions"
  ];
  
  const subheadings = [
    "Unlocking Resources, Driving Growth",
    "Your Trusted Partner in Mineral Extraction",
    "Environmental Responsibility at Every Step",
    "Pioneering the Future of Mining Technology"
  ];

  let headingIndex = 0;

  function changeText() {
    const headingElement = document.getElementById("dynamic-heading");
    const subheadingElement = document.getElementById("dynamic-subheading");

    headingIndex = (headingIndex + 1) % headings.length;

    headingElement.innerHTML = `<span class="text-orange-100 font-extrabold">${headings[headingIndex]}</span>`;
    subheadingElement.textContent = subheadings[headingIndex];
  }

  setInterval(changeText, 10000); // Change text every 5 seconds
});