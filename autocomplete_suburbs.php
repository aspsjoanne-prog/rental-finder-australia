<?php
require_once 'config.php';

$query = $_GET['q'] ?? '';
$query = trim($query);

if (strlen($query) < 2) {
    exit();
}

$suburbs = getAustralianSuburbs();
$matches = [];

foreach ($suburbs as $suburb) {
    $fullName = $suburb['suburb'] . ', ' . $suburb['state'] . ' ' . $suburb['postcode'];
    if (stripos($suburb['suburb'], $query) !== false || 
        stripos($fullName, $query) !== false) {
        $matches[] = $suburb;
    }
}

// Limit to 10 results
$matches = array_slice($matches, 0, 10);

if (empty($matches)) {
    echo '<div class="px-4 py-2 text-gray-500">No suburbs found</div>';
    exit();
}

foreach ($matches as $suburb) {
    $fullName = $suburb['suburb'] . ', ' . $suburb['state'] . ' ' . $suburb['postcode'];
    echo '<div class="px-4 py-2 hover:bg-blue-50 cursor-pointer suburb-suggestion" data-suburb="' . 
         htmlspecialchars($fullName) . '">' . 
         htmlspecialchars($fullName) . '</div>';
}
?>

<script>
$(document).ready(function() {
    $('.suburb-suggestion').on('click', function() {
        const currentValue = $('#suburbs').val();
        const selectedSuburb = $(this).data('suburb');
        
        if (currentValue) {
            // Add to existing suburbs (comma separated)
            const suburbs = currentValue.split(',').map(s => s.trim());
            if (!suburbs.includes(selectedSuburb)) {
                suburbs.push(selectedSuburb);
                $('#suburbs').val(suburbs.join(', '));
            }
        } else {
            $('#suburbs').val(selectedSuburb);
        }
        
        $('#suburbSuggestions').addClass('hidden');
    });
});
</script>
