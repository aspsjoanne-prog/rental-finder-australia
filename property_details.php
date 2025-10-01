<?php
require_once 'config.php';

$propertyId = $_GET['id'] ?? 1;

// Sample property details (in production, this would query the database)
$properties = [
    1 => [
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
        'orientation' => 'North-facing',
        'property_type' => 'Apartment',
        'description' => 'Stunning modern apartment in the heart of Surry Hills. Features include modern kitchen with stone benchtops, built-in wardrobes, and a private balcony with city views.',
        'features' => ['Air conditioning', 'Floorboards', 'Built-in wardrobes', 'Balcony', 'Modern kitchen', 'City views'],
        'images' => [
            'https://via.placeholder.com/600x400/4F46E5/FFFFFF?text=Living+Room',
            'https://via.placeholder.com/600x400/059669/FFFFFF?text=Kitchen',
            'https://via.placeholder.com/600x400/DC2626/FFFFFF?text=Bedroom',
            'https://via.placeholder.com/600x400/7C3AED/FFFFFF?text=Bathroom'
        ],
        'source_url' => 'https://realestate.com.au/sample1',
        'source_site' => 'realestate.com.au'
    ],
    2 => [
        'id' => 2,
        'title' => 'Spacious 3BR House in Newtown',
        'address' => '45 King Street, Newtown NSW 2042',
        'suburb' => 'Newtown',
        'price_per_week' => 850,
        'bedrooms' => 3,
        'bathrooms' => 2,
        'parking_spaces' => 2,
        'has_aircon' => false,
        'flooring_type' => 'carpet',
        'orientation' => 'East-facing',
        'property_type' => 'House',
        'description' => 'Charming Victorian terrace house with original features and modern updates. Large backyard perfect for entertaining.',
        'features' => ['Carpet flooring', 'Original features', 'Large backyard', 'Modern kitchen', 'Two bathrooms', 'Off-street parking'],
        'images' => [
            'https://via.placeholder.com/600x400/F59E0B/FFFFFF?text=Front+View',
            'https://via.placeholder.com/600x400/10B981/FFFFFF?text=Living+Area',
            'https://via.placeholder.com/600x400/3B82F6/FFFFFF?text=Kitchen',
            'https://via.placeholder.com/600x400/8B5CF6/FFFFFF?text=Backyard'
        ],
        'source_url' => 'https://domain.com.au/sample2',
        'source_site' => 'domain.com.au'
    ]
];

$property = $properties[$propertyId] ?? $properties[1];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($property['title']) ?> - Rental Finder</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8 max-w-6xl">
        <!-- Header -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 mb-2"><?= htmlspecialchars($property['title']) ?></h1>
                    <p class="text-lg text-gray-600 mb-2">
                        <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>
                        <?= htmlspecialchars($property['address']) ?>
                    </p>
                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                        <span><i class="fas fa-external-link-alt mr-1"></i><?= $property['source_site'] ?></span>
                        <span><i class="fas fa-home mr-1"></i><?= $property['property_type'] ?></span>
                        <span><i class="fas fa-compass mr-1"></i><?= $property['orientation'] ?></span>
                    </div>
                </div>
                <div class="text-right">
                    <div class="text-3xl font-bold text-green-600"><?= formatPrice($property['price_per_week']) ?></div>
                    <div class="text-sm text-gray-500">per week</div>
                    <a href="<?= $property['source_url'] ?>" target="_blank" 
                       class="inline-block mt-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        <i class="fas fa-external-link-alt mr-2"></i>View Original Listing
                    </a>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-6">
            <!-- Images -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-bold mb-4">Property Images</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <?php foreach ($property['images'] as $index => $image): ?>
                            <div class="relative group cursor-pointer" onclick="openImageModal('<?= $image ?>')">
                                <img src="<?= $image ?>" alt="Property Image <?= $index + 1 ?>" 
                                     class="w-full h-48 object-cover rounded-lg group-hover:opacity-90 transition-opacity">
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 rounded-lg transition-all flex items-center justify-center">
                                    <i class="fas fa-expand text-white opacity-0 group-hover:opacity-100 text-2xl"></i>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-white rounded-lg shadow-lg p-6 mt-6">
                    <h2 class="text-xl font-bold mb-4">Description</h2>
                    <p class="text-gray-700 leading-relaxed"><?= htmlspecialchars($property['description']) ?></p>
                </div>

                <!-- AI Analysis Results -->
                <div class="bg-white rounded-lg shadow-lg p-6 mt-6">
                    <h2 class="text-xl font-bold mb-4">
                        <i class="fas fa-robot text-purple-600 mr-2"></i>AI Image Analysis
                    </h2>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                            <h3 class="font-semibold text-green-800 mb-2">
                                <i class="fas fa-snowflake mr-2"></i>Air Conditioning
                            </h3>
                            <p class="text-sm text-green-700">
                                <?= $property['has_aircon'] ? 'Detected: Split system air conditioning visible in living area' : 'Not detected: No air conditioning units visible in images' ?>
                            </p>
                        </div>
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <h3 class="font-semibold text-blue-800 mb-2">
                                <i class="fas fa-th-large mr-2"></i>Flooring Type
                            </h3>
                            <p class="text-sm text-blue-700">
                                Detected: <?= ucfirst($property['flooring_type']) ?> flooring throughout main living areas
                            </p>
                        </div>
                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                            <h3 class="font-semibold text-yellow-800 mb-2">
                                <i class="fas fa-lightbulb mr-2"></i>Natural Light
                            </h3>
                            <p class="text-sm text-yellow-700">
                                Good natural light detected with large windows in living areas
                            </p>
                        </div>
                        <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                            <h3 class="font-semibold text-purple-800 mb-2">
                                <i class="fas fa-couch mr-2"></i>Furnishing
                            </h3>
                            <p class="text-sm text-purple-700">
                                Unfurnished property - no furniture detected in images
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Property Details Sidebar -->
            <div class="space-y-6">
                <!-- Key Features -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-bold mb-4">Key Features</h2>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="flex items-center"><i class="fas fa-bed text-blue-500 mr-2"></i>Bedrooms</span>
                            <span class="font-semibold"><?= $property['bedrooms'] ?></span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="flex items-center"><i class="fas fa-bath text-blue-500 mr-2"></i>Bathrooms</span>
                            <span class="font-semibold"><?= $property['bathrooms'] ?></span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="flex items-center"><i class="fas fa-car text-blue-500 mr-2"></i>Parking</span>
                            <span class="font-semibold"><?= $property['parking_spaces'] ?></span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="flex items-center"><i class="fas fa-snowflake text-blue-500 mr-2"></i>Air Con</span>
                            <span class="font-semibold"><?= $property['has_aircon'] ? 'Yes' : 'No' ?></span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="flex items-center"><i class="fas fa-th-large text-blue-500 mr-2"></i>Flooring</span>
                            <span class="font-semibold"><?= ucfirst($property['flooring_type']) ?></span>
                        </div>
                    </div>
                </div>

                <!-- Features List -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-bold mb-4">Property Features</h2>
                    <div class="space-y-2">
                        <?php foreach ($property['features'] as $feature): ?>
                            <div class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                <span class="text-sm"><?= htmlspecialchars($feature) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Contact Actions -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-bold mb-4">Interested?</h2>
                    <div class="space-y-3">
                        <button class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 font-semibold">
                            <i class="fas fa-phone mr-2"></i>Contact Agent
                        </button>
                        <button class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 font-semibold">
                            <i class="fas fa-calendar mr-2"></i>Book Inspection
                        </button>
                        <button class="w-full bg-purple-600 text-white py-3 rounded-lg hover:bg-purple-700 font-semibold">
                            <i class="fas fa-heart mr-2"></i>Save Property
                        </button>
                    </div>
                </div>

                <!-- Map -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-bold mb-4">Location</h2>
                    <div class="bg-gray-200 h-48 rounded-lg flex items-center justify-center">
                        <div class="text-center text-gray-600">
                            <i class="fas fa-map text-4xl mb-2"></i>
                            <p>Interactive Map</p>
                            <p class="text-sm"><?= htmlspecialchars($property['suburb']) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 z-50 hidden flex items-center justify-center p-4">
        <div class="relative max-w-4xl max-h-full">
            <img id="modalImage" src="" alt="Property Image" class="max-w-full max-h-full object-contain">
            <button onclick="closeImageModal()" 
                    class="absolute top-4 right-4 text-white text-2xl hover:text-gray-300">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <script>
        function openImageModal(imageSrc) {
            document.getElementById('modalImage').src = imageSrc;
            document.getElementById('imageModal').classList.remove('hidden');
        }

        function closeImageModal() {
            document.getElementById('imageModal').classList.add('hidden');
        }

        // Close modal when clicking outside the image
        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeImageModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeImageModal();
            }
        });
    </script>
</body>
</html>
