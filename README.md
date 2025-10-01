# Rental Finder Australia

A comprehensive rental property search platform similar to booking.com but specifically designed for Australian rental properties. This application allows users to search and filter rental properties with advanced criteria and commute time calculations.

## 🚀 Live Demo
**Current Live URL:** http://20.169.133.174/rental-finder/

## 📋 Features Implemented

### ✅ Core Functionality
- **Property Search & Filtering:**
  - Number of bedrooms, bathrooms, parking spaces
  - Air conditioning requirements
  - Flooring type (carpet, floorboards, tiles)
  - Property orientation (north, south, east, west-facing)
  - Price range filtering
  - Location-based search

- **Australian Location Support:**
  - Suburb autocomplete for Australian locations
  - Work address autocomplete
  - Commute time calculation framework

- **User Interface:**
  - Modern, responsive design using Tailwind CSS
  - Property comparison table
  - Detailed property listings
  - Image gallery support

### 🗄️ Database Schema
- **Properties table:** Complete property information
- **Property Images:** Multiple images per property
- **Australian Suburbs:** Comprehensive suburb database
- **User Searches:** Search history and preferences

## 🛠️ Technical Stack
- **Backend:** PHP 7.4+
- **Database:** MySQL 8.0
- **Frontend:** HTML5, Tailwind CSS, JavaScript
- **Server:** Apache 2.4
- **Version Control:** Git

## 📁 File Structure
```
/var/www/html/rental-finder/
├── index.php                    # Main search interface
├── search.php                   # Backend search logic
├── property_details.php         # Property detail pages
├── autocomplete_suburbs.php     # Suburb autocomplete API
├── autocomplete_address.php     # Address autocomplete API
├── config.php                   # Database configuration
├── database_backup.sql          # Complete database backup
└── README.md                    # This file
```

## 🔧 Setup Instructions

### 1. Database Setup
```bash
mysql -u root -e "
CREATE DATABASE rental_finder;
CREATE USER 'rental_user'@'localhost' IDENTIFIED BY 'rental_pass123';
GRANT ALL PRIVILEGES ON rental_finder.* TO 'rental_user'@'localhost';
FLUSH PRIVILEGES;"

# Import the database
mysql -u root rental_finder < database_backup.sql
```

### 2. Web Server Setup
```bash
# Copy files to web directory
cp -r * /var/www/html/rental-finder/

# Set proper permissions
chown -R www-data:www-data /var/www/html/rental-finder/
chmod -R 755 /var/www/html/rental-finder/
```

### 3. Configuration
Update database credentials in `config.php` if needed:
```php
$host = 'localhost';
$dbname = 'rental_finder';
$username = 'rental_user';
$password = 'rental_pass123';
```

## 📊 Sample Data
The database includes 16 sample properties across major Australian cities:
- Sydney (Surry Hills, Bondi, CBD)
- Melbourne (Fitzroy, South Yarra, Carlton)
- Brisbane (New Farm, West End)
- Perth (Fremantle, Subiaco)

## 🔮 Planned Features (Next Phase)
- [ ] Real-time data scraping from realestate.com.au and domain.com.au
- [ ] AI image analysis for property features
- [ ] Google Maps API integration for commute calculations
- [ ] Advanced property comparison tools
- [ ] User accounts and saved searches
- [ ] Mobile app development
- [ ] Property analytics and market trends

## 🚀 Future Development Sessions
To continue development in future sessions, use this prompt:

**"Continue developing the Rental Finder Australia project. The current codebase is at https://github.com/aspsjoanne-prog/rental-finder-australia.git with a live demo at the server IP. Focus on implementing the next phase features: AI image analysis, real-time commute calculations, and enhanced data scraping. Use the 3-step process for file edits and preserve all existing functionality."**

## 📝 Development Notes
- All database credentials and configurations are preserved
- Sample data includes realistic Australian property information
- UI is built with Tailwind CSS for modern, responsive design
- Code follows PHP best practices with prepared statements
- Git repository maintains complete version history

## 🤝 Contributing
This is a personal project. For future development, clone the repository and follow the setup instructions above.

## 📄 License
Private project - All rights reserved.

---
**Last Updated:** October 2024
**Version:** 1.0.0
**Status:** Core functionality complete, ready for next phase development
