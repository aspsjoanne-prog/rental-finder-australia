<?php
require_once 'config.php';

// Get search parameters
$workAddress = $_POST['work_address'] ?? '';
$suburbs = $_POST['suburbs'] ?? '';
$bedrooms = $_POST['bedrooms'] ?? '';
$bathrooms = $_POST['bathrooms'] ?? '';
$parking = $_POST['parking'] ?? '';
$maxPrice = $_POST['max_price'] ?? '';
$aircon = $_POST['aircon'] ?? '';
$flooring = $_POST['flooring'] ?? '';
$orientation = $_POST['orientation'] ?? '';
$transport = $_POST['transport'] ?? 'driving';

// For demo purposes, let's create some sample properties
// In production, this would query scraped data from realestate.com.au and domain.com.au
$sampleProperties = [
    [
        'id' => 1,
        'title' => 'Modern 2BR Apartment in Surry Hills',
        'address' => '123 Crown Street, Surry Hills NSW 2010',
        'suburb' => 'Surry Hills',
        'price_per_week' => 650,
        'bedrooms' => 2,
        'bathrooms' => 1,
        'parking_spaces' => 1,
        'has_aircon' => true,
        'flooring_type' => 'floorboards',
        'orientation' => 'north-facing',
        'latitude' => -33.8886,
        'longitude' => 151.2094,
        'source_url' => 'https://realestate.com.au/sample1',
        'source_site' => 'realestate.com.au'
    ],
    [
        'id' => 2,
        'title' => 'Spacious 3BR House in Newtown',
        'address' => '45 King Street, Newtown NSW 2042',
        'suburb' => 'Newtown',
        'price_per_week' => 850,
        'bedrooms' => 3,
        'bathrooms' => 2,
        'parking_spaces' => 2,
        'flooring_type' => 'carpet',
        'orientation' => 'east-facing',
        'flooring_type' => 'carpet',
        'latitude' => -33.8988,
        'longitude' => 151.1794,
        'source_url' => 'https://domain.com.au/sample2',
        'source_site' => 'domain.com.au'
    ],
    [
        'id' => 3,
        'title' => 'Luxury 1BR Studio in Bondi',
        'address' => '78 Campbell Parade, Bondi Beach NSW 2026',
        'suburb' => 'Bondi Beach',
        'price_per_week' => 750,
        'bedrooms' => 1,
        'bathrooms' => 1,
        'flooring_type' => 'tiles',
        'orientation' => 'south-facing',
        'has_aircon' => true,
        'flooring_type' => 'tiles',
        'latitude' => -33.8915,
        'longitude' => 151.2767,
        'source_url' => 'https://realestate.com.au/sample3',
        'source_site' => 'realestate.com.au'
    ],
    [
        'id' => 4,
        'title' => 'Charming 2BR Terrace in Paddington',
        'address' => '12 Oxford Street, Paddington NSW 2021',
        'suburb' => 'Paddington',
        'price_per_week' => 900,
        'bedrooms' => 2,
        'bathrooms' => 2,
        'parking_spaces' => 1,
        'has_aircon' => true,
        'flooring_type' => 'floorboards',
        'orientation' => 'west-facing',
        'latitude' => -33.8848,
        'longitude' => 151.2299,
        'source_url' => 'https://domain.com.au/sample4',
        'source_site' => 'domain.com.au'
    ],
    [
        'id' => 5,
        'title' => 'Modern 3BR Apartment in Glebe',
        'address' => '56 Glebe Point Road, Glebe NSW 2037',
        'suburb' => 'Glebe',
        'price_per_week' => 780,
        'bedrooms' => 3,
        'bathrooms' => 2,
        'parking_spaces' => 1,
        'has_aircon' => false,
        'flooring_type' => 'floorboards',
        'orientation' => 'north-facing',
        'latitude' => -33.8794,
        'longitude' => 151.1847,
        'source_url' => 'https://realestate.com.au/sample5',
        'source_site' => 'realestate.com.au'
    ]
];

// Filter properties based on search criteria
$filteredProperties = [];

foreach ($sampleProperties as $property) {
    // Filter by bedrooms
    if ($bedrooms && $property['bedrooms'] < $bedrooms) continue;
    
    // Filter by bathrooms
    if ($bathrooms && $property['bathrooms'] < $bathrooms) continue;
    
    // Filter by parking
    if ($parking && $property['parking_spaces'] < $parking) continue;
    
    // Filter by max price
    if ($maxPrice && $property['price_per_week'] > $maxPrice) continue;
    
    // Filter by aircon requirement
    if ($aircon === 'required' && !$property['has_aircon']) continue;
    
    // Filter by flooring
    if ($flooring && $property['flooring_type'] !== $flooring) continue;
    
    // Filter by orientation
    if ($orientation && stripos($property['orientation'], $orientation) === false) continue;
    
    // Filter by suburbs (if specified)
    if ($suburbs) {
        $suburbList = array_map('trim', explode(',', $suburbs));
        $matchFound = false;
        foreach ($suburbList as $suburb) {
            if (stripos($suburb, $property['suburb']) !== false) {
                $matchFound = true;
                break;
            }
        }
        if (!$matchFound) continue;
    }
    
    $filteredProperties[] = $property;
}

// Calculate commute times and costs (mock data for demo)
function calculateCommute($property, $workAddress, $transport) {
    // In production, this would use Google Maps API
    // For demo, we'll simulate based on distance from CBD
    $cbdLat = -33.8688;
    $cbdLng = 151.2093;
    
    $distance = calculateDistance(
        $property['latitude'], 
        $property['longitude'], 
        $cbdLat, 
        $cbdLng
    );
    
    // Simulate commute time based on transport mode and distance
    switch ($transport) {
        case 'driving':
            $timeMinutes = round($distance * 3 + rand(5, 15)); // ~3 min per km + traffic
            $costPerDay = round($distance * 0.5 + 5); // Petrol + parking
            break;
        case 'transit':
            $timeMinutes = round($distance * 4 + rand(10, 20)); // Public transport
            $costPerDay = 8.5; // Daily public transport
            break;
        case 'walking':
            $timeMinutes = round($distance * 12); // ~12 min per km
            $costPerDay = 0;
            break;
        case 'bicycling':
            $timeMinutes = round($distance * 4); // ~4 min per km
            $costPerDay = 0;
            break;
        default:
            $timeMinutes = round($distance * 3 + rand(5, 15));
            $costPerDay = round($distance * 0.5 + 5);
    }
    
    return [
        'time' => $timeMinutes,
        'cost_per_day' => $costPerDay,
        'cost_per_week' => $costPerDay * 5
    ];
}

// Add commute data to properties
foreach ($filteredProperties as &$property) {
    $commute = calculateCommute($property, $workAddress, $transport);
    $property['commute'] = $commute;
}

// Sort by commute time (shortest first)
usort($filteredProperties, function($a, $b) {
    return $a['commute']['time'] - $b['commute']['time'];
});

// Generate results HTML
if (empty($filteredProperties)) {
    echo '<tr><td colspan="7" class="px-6 py-8 text-center text-gray-500">
            <i class="fas fa-search text-4xl mb-4 block"></i>
            <p class="text-lg">No properties found matching your criteria.</p>
            <p class="text-sm mt-2">Try adjusting your search filters.</p>
          </td></tr>';
} else {
    foreach ($filteredProperties as $property) {
        $features = [];
        if ($property['has_aircon']) $features[] = '<span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">A/C</span>';
        $features[] = '<span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">' . ucfirst($property['flooring_type']) . '</span>';
        
        $featuresHtml = implode(' ', $features);
        
        echo '<tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                    <div class="font-medium text-gray-900">' . htmlspecialchars($property['title']) . '</div>
                    <div class="text-sm text-gray-500">' . htmlspecialchars($property['address']) . '</div>
                    <div class="text-xs text-gray-400 mt-1">
                        <i class="fas fa-external-link-alt mr-1"></i>' . $property['source_site'] . '
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="text-lg font-semibold text-green-600">' . formatPrice($property['price_per_week']) . '</div>
                    <div class="text-xs text-gray-500">per week</div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex space-x-4 text-sm">
                        <span><i class="fas fa-bed text-blue-500"></i> ' . $property['bedrooms'] . '</span>
                        <span><i class="fas fa-bath text-blue-500"></i> ' . $property['bathrooms'] . '</span>
                        <span><i class="fas fa-car text-blue-500"></i> ' . $property['parking_spaces'] . '</span>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="space-y-1">' . $featuresHtml . '</div>
                </td>
                <td class="px-6 py-4">
                    <div class="font-medium">' . formatCommute($property['commute']['time']) . '</div>
                    <div class="text-xs text-gray-500 capitalize">' . $transport . '</div>
                </td>
                <td class="px-6 py-4">
                    <div class="font-medium">' . formatPrice($property['commute']['cost_per_day']) . '/day</div>
                    <div class="text-xs text-gray-500">' . formatPrice($property['commute']['cost_per_week']) . '/week</div>
                </td>
                <td class="px-6 py-4">
                    <button onclick="viewProperty(' . $property['id'] . ')" 
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
                        <i class="fas fa-eye mr-1"></i> View
                    </button>
                </td>
              </tr>';
    }
}
?>

<script>
function viewProperty(id) {
    // Open property details modal or new window
    window.open('property_details.php?id=' + id, '_blank', 'width=800,height=600');
}
</script>
