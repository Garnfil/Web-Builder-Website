// dark/light mode

const toggleBtn = document.querySelector('.toggle');
const paymentContainer = document.querySelector('.payment-container');

toggleBtn.addEventListener('click', () => {
  paymentContainer.classList.toggle('active-toggle');
})
