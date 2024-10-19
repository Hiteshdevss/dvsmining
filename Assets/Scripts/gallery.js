// JavaScript for filtering gallery items
const filterBtns = document.querySelectorAll('.filter-btn');
const galleryItems = document.querySelectorAll('.gallery-item');
const modal = document.getElementById('image-modal');
const modalImage = document.getElementById('modal-image');
const closeModal = document.getElementById('close-modal');

filterBtns.forEach(btn => {
  btn.addEventListener('click', () => {
    const category = btn.getAttribute('data-category');
    galleryItems.forEach(item => {
      if (category === 'all' || item.classList.contains(category)) {
        item.style.display = 'block';
      } else {
        item.style.display = 'none';
      }
    });

    // Update active button styling
    filterBtns.forEach(button => {
      button.classList.remove('bg-orange-600', 'text-white');
      button.classList.add('bg-orange-100', 'text-orange-600');
    });
    btn.classList.remove('bg-orange-100', 'text-orange-600');
    btn.classList.add('bg-orange-600', 'text-white');
  });
});

// Popup functionality
galleryItems.forEach(item => {
  item.addEventListener('click', () => {
    const imgSrc = item.getAttribute('data-image');
    modalImage.src = imgSrc;
    modal.classList.remove('hidden');
  });
});

// Close modal
closeModal.addEventListener('click', () => {
  modal.classList.add('hidden');
});

// Close modal on outside click
window.addEventListener('click', (e) => {
  if (e.target === modal) {
    modal.classList.add('hidden');
  }
});