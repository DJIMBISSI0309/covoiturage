<div class="container mt-5">
    <h2>Mes réservations</h2>
    <div id="bookings-list">
        <!-- Les réservations seront chargées ici -->
    </div>
</div>

<script>
// Charger les réservations
function loadBookings() {
    fetch('../includes/get_bookings.php')
        .then(response => response.json())
        .then(bookings => {
            const list = document.getElementById('bookings-list');
            list.innerHTML = '';

            bookings.forEach(booking => {
                const bookingItem = document.createElement('div');
                bookingItem.className = 'card mb-3';
                bookingItem.innerHTML = 
                    <div class="card-body">
                        <h5>${booking.departure} → ${booking.destination}</h5>
                        <p>Départ: ${new Date(booking.departure_time).toLocaleString()}</p>
                        <p>Places: ${booking.seats_reserved}</p>
                        <button 
                            class="btn btn-danger cancel-btn" 
                            data-booking-id="${booking.id}"
                            ${booking.status === 'cancelled' ? 'disabled' : ''}
                        >
                            Annuler
                        </button>
                    </div>
                ;
                list.appendChild(bookingItem);
            });
        });
}

// Gérer l'annulation
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('cancel-btn')) {
        const bookingId = e.target.getAttribute('data-booking-id');
        fetch('../includes/cancel_booking.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: booking_id=${bookingId}
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                loadBookings(); // Recharger la liste
            } else {
                alert(data.message);
            }
        });
    }
});

// Charger au démarrage
document.addEventListener('DOMContentLoaded', loadBookings);
</script>


//Après l'annulation

  $message = "Réservation annulée : {$booking['seats_reserved']} place(s).";
  $stmt = $conn->prepare("INSERT INTO notifications (user_id, message) VALUES (:user_id, :message)");
  $stmt->execute(['user_id' => $booking['user_id'], 'message' => $message]);<div class="container mt-5">
    <h2>Mes réservations</h2>
    <div id="bookings-list">
        <!-- Les réservations seront chargées ici -->
    </div>
</div>

<script>
// Charger les réservations
function loadBookings() {
    fetch('../includes/get_bookings.php')
        .then(response => response.json())
        .then(bookings => {
            const list = document.getElementById('bookings-list');
            list.innerHTML = '';

            bookings.forEach(booking => {
                const bookingItem = document.createElement('div');
                bookingItem.className = 'card mb-3';
                bookingItem.innerHTML = 
                    <div class="card-body">
                        <h5>${booking.departure} → ${booking.destination}</h5>
                        <p>Départ: ${new Date(booking.departure_time).toLocaleString()}</p>
                        <p>Places: ${booking.seats_reserved}</p>
                        <button 
                            class="btn btn-danger cancel-btn" 
                            data-booking-id="${booking.id}"
                            ${booking.status === 'cancelled' ? 'disabled' : ''}
                        >
                            Annuler
                        </button>
                    </div>
                ;
                list.appendChild(bookingItem);
            });
        });
}

// Gérer l'annulation
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('cancel-btn')) {
        const bookingId = e.target.getAttribute('data-booking-id');
        fetch('../includes/cancel_booking.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: booking_id=${bookingId}
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                loadBookings(); // Recharger la liste
            } else {
                alert(data.message);
            }
        });
    }
});

// Charger au démarrage
document.addEventListener('DOMContentLoaded', loadBookings);
</script>
bookingItem.classNamelist.innerHTMLCREATE TABLE bookings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    ride_id INT NOT NULL,
    user_id INT NOT NULL,
    seats_reserved INT NOT NULL,
    status ENUM('confirmed', 'cancelled') DEFAULT 'confirmed',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (ride_id) REFERENCES rides(id)
);CREATE TABLE rides (
    id INT PRIMARY KEY AUTO_INCREMENT,
    departure VARCHAR(255) NOT NULL,
    destination VARCHAR(255) NOT NULL,
    departure_time DATETIME NOT NULL, -- Heure de départ
    seats INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    user_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
// Après l'annulation
  $message = "Réservation annulée : {$booking['seats_reserved']} place(s).";
  $stmt = $conn->prepare("INSERT INTO notifications (user_id, message) VALUES (:user_id, :message)");
  $stmt->execute(['user_id' => $booking['user_id'], 'message' => $message]);