class LocationManager {
    constructor() {
        this.watchId = null;
    }

    // Démarrer le suivi de la position
    startTracking(userId, reservationId) {
        if ("geolocation" in navigator) {
            this.watchId = navigator.geolocation.watchPosition(
                (position) => this.updateLocation(position, userId, reservationId),
                (error) => this.handleError(error),
                {
                    enableHighAccuracy: true,
                    timeout: 5000,
                    maximumAge: 0
                }
            );
        } else {
            alert("La géolocalisation n'est pas supportée par votre navigateur");
        }
    }

    // Arrêter le suivi
    stopTracking() {
        if (this.watchId !== null) {
            navigator.geolocation.clearWatch(this.watchId);
            this.watchId = null;
        }
    }

    // Mettre à jour la position sur le serveur
    updateLocation(position, userId, reservationId) {
        const data = {
            userId: userId,
            reservationId: reservationId,
            latitude: position.coords.latitude,
            longitude: position.coords.longitude
        };

        fetch('update_location.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => console.log('Success:', data))
        .catch(error => console.error('Error:', error));
    }

    // Gérer les erreurs de géolocalisation
    handleError(error) {
        let message;
        switch(error.code) {
            case error.PERMISSION_DENIED:
                message = "L'utilisateur a refusé la demande de géolocalisation.";
                break;
            case error.POSITION_UNAVAILABLE:
                message = "L'information de localisation n'est pas disponible.";
                break;
            case error.TIMEOUT:
                message = "La demande de localisation a expiré.";
                break;
            default:
                message = "Une erreur inconnue est survenue.";
                break;
        }
        console.error(message);
    }
}

// Pour le conducteur : afficher la carte et la position du client
class DriverMap {
    constructor(mapElementId) {
        this.map = null;
        this.clientMarker = null;
        this.mapElementId = mapElementId;
    }

    // Initialiser la carte
    initMap(latitude, longitude) {
        this.map = L.map(this.mapElementId).setView([latitude, longitude], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(this.map);
    }

    // Mettre à jour la position du client sur la carte
    updateClientPosition(latitude, longitude) {
        if (!this.clientMarker) {
            this.clientMarker = L.marker([latitude, longitude]).addTo(this.map);
        } else {
            this.clientMarker.setLatLng([latitude, longitude]);
        }
        this.map.setView([latitude, longitude], 13);
    }
} 