# NestNotes - Flat Sharing

NestNotes is a flat-sharing platform designed to help students and working professionals find suitable flats and roommates.

## Week 2 - Backend Development

The Week 2 work focuses on building the backend API for the flat listing feature and connecting it with a MySQL database.
## Technologies Used

- HTML
- CSS
- JavaScript
- PHP
- MySQL
- XAMPP
## Database

The project uses a MySQL database named `nestnotes`.

### Listings Table

The `listings` table contains:

- `id` - Unique listing ID
- `title` - Title of the flat listing
- `description` - Description of the flat
- `location` - Flat location
- `rent` - Monthly rent
- `created_at` - Date and time the listing was created
## API Tests

The API endpoints were tested successfully.

### GET Endpoint Test

```text
GET TEST PASSED
Listings found: 2
### POST Endpoint Test

```text
POST TEST PASSED
Created listing ID: 3
## How to Run

1. Install XAMPP.
2. Start Apache and MySQL from the XAMPP Control Panel.
3. Open phpMyAdmin.
4. Create a database named `nestnotes`.
5. Create the `listings` table.
6. Open the project through:

http://localhost/nestnotes/