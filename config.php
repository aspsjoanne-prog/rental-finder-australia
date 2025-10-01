<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'rental_finder');
define('DB_USER', 'rental_user');
define('DB_PASS', 'rental_pass123');

// API Keys (you'll need to add your own)
define('GOOGLE_MAPS_API_KEY', 'YOUR_GOOGLE_MAPS_API_KEY');
define('OPENAI_API_KEY', 'YOUR_OPENAI_API_KEY');

// Database connection
function getDBConnection() {
    try {
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch(PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

// Australian suburbs data (sample)
function getAustralianSuburbs() {
    return [
        ['suburb' => 'Surry Hills', 'state' => 'NSW', 'postcode' => '2010'],
        ['suburb' => 'Bondi', 'state' => 'NSW', 'postcode' => '2026'],
        ['suburb' => 'Paddington', 'state' => 'NSW', 'postcode' => '2021'],
        ['suburb' => 'Newtown', 'state' => 'NSW', 'postcode' => '2042'],
        ['suburb' => 'Glebe', 'state' => 'NSW', 'postcode' => '2037'],
        ['suburb' => 'Redfern', 'state' => 'NSW', 'postcode' => '2016'],
        ['suburb' => 'Darlinghurst', 'state' => 'NSW', 'postcode' => '2010'],
        ['suburb' => 'Kings Cross', 'state' => 'NSW', 'postcode' => '2011'],
        ['suburb' => 'Potts Point', 'state' => 'NSW', 'postcode' => '2011'],
        ['suburb' => 'Woollahra', 'state' => 'NSW', 'postcode' => '2025'],
        ['suburb' => 'Double Bay', 'state' => 'NSW', 'postcode' => '2028'],
        ['suburb' => 'Rose Bay', 'state' => 'NSW', 'postcode' => '2029'],
        ['suburb' => 'Vaucluse', 'state' => 'NSW', 'postcode' => '2030'],
        ['suburb' => 'Bondi Junction', 'state' => 'NSW', 'postcode' => '2022'],
        ['suburb' => 'Randwick', 'state' => 'NSW', 'postcode' => '2031'],
        ['suburb' => 'Coogee', 'state' => 'NSW', 'postcode' => '2034'],
        ['suburb' => 'Maroubra', 'state' => 'NSW', 'postcode' => '2035'],
        ['suburb' => 'Bondi Beach', 'state' => 'NSW', 'postcode' => '2026'],
        ['suburb' => 'Bronte', 'state' => 'NSW', 'postcode' => '2024'],
        ['suburb' => 'Tamarama', 'state' => 'NSW', 'postcode' => '2026'],
        // Melbourne suburbs
        ['suburb' => 'South Yarra', 'state' => 'VIC', 'postcode' => '3141'],
        ['suburb' => 'Toorak', 'state' => 'VIC', 'postcode' => '3142'],
        ['suburb' => 'Richmond', 'state' => 'VIC', 'postcode' => '3121'],
        ['suburb' => 'Fitzroy', 'state' => 'VIC', 'postcode' => '3065'],
        ['suburb' => 'Carlton', 'state' => 'VIC', 'postcode' => '3053'],
        ['suburb' => 'St Kilda', 'state' => 'VIC', 'postcode' => '3182'],
        ['suburb' => 'Prahran', 'state' => 'VIC', 'postcode' => '3181'],
        ['suburb' => 'Windsor', 'state' => 'VIC', 'postcode' => '3181'],
        ['suburb' => 'Chapel Street', 'state' => 'VIC', 'postcode' => '3141'],
        ['suburb' => 'Collingwood', 'state' => 'VIC', 'postcode' => '3066'],
        // Brisbane suburbs
        ['suburb' => 'New Farm', 'state' => 'QLD', 'postcode' => '4005'],
        ['suburb' => 'Fortitude Valley', 'state' => 'QLD', 'postcode' => '4006'],
        ['suburb' => 'West End', 'state' => 'QLD', 'postcode' => '4101'],
        ['suburb' => 'South Brisbane', 'state' => 'QLD', 'postcode' => '4101'],
        ['suburb' => 'Kangaroo Point', 'state' => 'QLD', 'postcode' => '4169'],
        // Perth suburbs
        ['suburb' => 'Subiaco', 'state' => 'WA', 'postcode' => '6008'],
        ['suburb' => 'Fremantle', 'state' => 'WA', 'postcode' => '6160'],
        ['suburb' => 'Cottesloe', 'state' => 'WA', 'postcode' => '6011'],
        ['suburb' => 'Leederville', 'state' => 'WA', 'postcode' => '6007'],
        // Adelaide suburbs
        ['suburb' => 'North Adelaide', 'state' => 'SA', 'postcode' => '5006'],
        ['suburb' => 'Unley', 'state' => 'SA', 'postcode' => '5061'],
        ['suburb' => 'Norwood', 'state' => 'SA', 'postcode' => '5067']
    ];
}

// Utility functions
function calculateDistance($lat1, $lon1, $lat2, $lon2) {
    $earthRadius = 6371; // km
    
    $dLat = deg2rad($lat2 - $lat1);
    $dLon = deg2rad($lon2 - $lon1);
    
    $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon/2) * sin($dLon/2);
    $c = 2 * atan2(sqrt($a), sqrt(1-$a));
    
    return $earthRadius * $c;
}

function formatPrice($price) {
    return '$' . number_format($price, 0);
}

function formatCommute($minutes) {
    if ($minutes < 60) {
        return $minutes . ' min';
    } else {
        $hours = floor($minutes / 60);
        $mins = $minutes % 60;
        return $hours . 'h ' . $mins . 'm';
    }
}
?>
