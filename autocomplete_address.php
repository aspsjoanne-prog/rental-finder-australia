<?php
require_once 'config.php';

$query = $_GET['q'] ?? '';
$query = trim($query);

if (strlen($query) < 3) {
    exit();
}

// For demo purposes, we'll use a simple address list
// In production, you'd integrate with Google Places API
$addresses = [
    'Sydney CBD, NSW 2000',
    'Melbourne CBD, VIC 3000',
    'Brisbane CBD, QLD 4000',
    'Perth CBD, WA 6000',
    'Adelaide CBD, SA 5000',
    'Circular Quay, Sydney NSW 2000',
    'Martin Place, Sydney NSW 2000',
    'George Street, Sydney NSW 2000',
    'Collins Street, Melbourne VIC 3000',
    'Bourke Street, Melbourne VIC 3000',
    'Queen Street, Brisbane QLD 4000',
    'King Street, Perth WA 6000',
    'Rundle Mall, Adelaide SA 5000',
    'Macquarie University, NSW 2109',
    'University of Sydney, NSW 2006',
    'UNSW Sydney, NSW 2052',
    'University of Melbourne, VIC 3010',
    'Monash University, VIC 3800',
    'Griffith University, QLD 4111',
    'University of Queensland, QLD 4072',
    'Curtin University, WA 6102',
    'University of Western Australia, WA 6009',
    'University of Adelaide, SA 5005',
    'Flinders University, SA 5042'
];

$matches = [];
foreach ($addresses as $address) {
    if (stripos($address, $query) !== false) {
        $matches[] = $address;
    }
}

// Add some common business districts and areas
$commonAreas = [
    'North Sydney Business District, NSW',
    'Parramatta CBD, NSW',
    'Chatswood Business District, NSW',
    'Bondi Junction, NSW',
    'Southbank, Melbourne VIC',
    'Docklands, Melbourne VIC',
    'South Yarra, Melbourne VIC',
    'Fortitude Valley, Brisbane QLD',
    'Milton, Brisbane QLD',
    'Subiaco, Perth WA',
    'Fremantle, Perth WA',
    'North Adelaide, SA'
];

foreach ($commonAreas as $area) {
    if (stripos($area, $query) !== false) {
        $matches[] = $area;
    }
}

// Limit to 8 results
$matches = array_unique($matches);
$matches = array_slice($matches, 0, 8);

if (empty($matches)) {
    echo '<div class="px-4 py-2 text-gray-500">No addresses found</div>';
    exit();
}

foreach ($matches as $address) {
    echo '<div class="px-4 py-2 hover:bg-green-50 cursor-pointer address-suggestion" data-address="' . 
         htmlspecialchars($address) . '">' . 
         '<i class="fas fa-map-marker-alt text-green-500 mr-2"></i>' .
         htmlspecialchars($address) . '</div>';
}
?>

<script>
$(document).ready(function() {
    $('.address-suggestion').on('click', function() {
        const selectedAddress = $(this).data('address');
        $('#workAddress').val(selectedAddress);
        $('#workAddressSuggestions').addClass('hidden');
    });
});
</script>
