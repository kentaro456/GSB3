const container = document.querySelector('.container');
const seats = document.querySelectorAll('.row .seat:not(.occupied)');
const count = document.getElementById('count');
const total = document.getElementById('total');
const conference = document.getElementById('conference');
const presentation = document.getElementById('presentation');
const date = document.getElementById('date');

// Populate UI with saved data
populateUI();

// Initialize ticket price based on selected conference
let ticketPrice = +conference.value;

// Function to save selected movie index and price
const setMovieData = (movieIndex, moviePrice) => {
    localStorage.setItem('selectedMovieIndex', movieIndex);
    localStorage.setItem('selectedMoviePrice', moviePrice);
};

// Function to update total and count
const updateSelectedCount = () => {
    const selectedSeats = document.querySelectorAll('.row .seat.selected');
    const selectedSeatsCount = selectedSeats.length;

    count.innerText = selectedSeatsCount;
    total.innerText = selectedSeatsCount * ticketPrice;

    // Save selected seats to local storage
    const seatsIndex = [...selectedSeats].map(seat => [...seats].indexOf(seat));
    localStorage.setItem('selectedSeats', JSON.stringify(seatsIndex));
};

// Function to populate UI with saved data
function populateUI() {
    const selectedSeats = JSON.parse(localStorage.getItem('selectedSeats'));
    const selectedConferenceIndex = localStorage.getItem('selectedMovieIndex');

    if (selectedSeats !== null && selectedSeats.length > 0) {
        seats.forEach((seat, index) => {
            if (selectedSeats.indexOf(index) > -1) {
                seat.classList.add('selected');
            }
        });
    }

    if (selectedConferenceIndex !== null) {
        conference.selectedIndex = selectedConferenceIndex;
    }
}

// Movie select event
conference.addEventListener('change', e => {
    ticketPrice = +e.target.value;
    setMovieData(e.target.selectedIndex, e.target.value);
    updateSelectedCount();
});

// Seat click event
container.addEventListener('click', e => {
    if (e.target.classList.contains('seat') && !e.target.classList.contains('occupied')) {
        e.target.classList.toggle('selected');
        updateSelectedCount();
    }
});

// Initial count and total
updateSelectedCount();