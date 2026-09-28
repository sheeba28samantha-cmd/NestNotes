const API_URL = "backend/listings.php";

async function loadListings() {
    try {
        const response = await fetch(API_URL);

        if (!response.ok) {
            throw new Error("Failed to load listings");
        }

        const listings = await response.json();

        console.log("Listings from database:", listings);

    } catch (error) {
        console.error("Error loading listings:", error);
    }
}

loadListings();