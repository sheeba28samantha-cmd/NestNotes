const API_URL = "backend/listings.php";


async function loadListings() {

    const container =
        document.getElementById("listings-container");

    try {

        const response = await fetch(API_URL);

        if (!response.ok) {

            throw new Error("Failed to load listings");

        }

        const listings = await response.json();


        if (listings.length === 0) {

            container.innerHTML =
                "<p>No listings available.</p>";

            return;

        }


        container.innerHTML = "";


        listings.forEach(function(listing) {

            const card =
                document.createElement("div");


            card.innerHTML = `

                <h3>${listing.title}</h3>

                <p>${listing.description}</p>

                <p>
                    <strong>Location:</strong>
                    ${listing.location}
                </p>

                <p>
                    <strong>Rent:</strong>
                    ₹${listing.rent}
                </p>

            `;


            container.appendChild(card);

        });

    } catch (error) {

        container.innerHTML =
            "<p>Unable to load listings.</p>";

        console.error(error);

    }

}


loadListings();