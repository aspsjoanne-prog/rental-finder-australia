<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Finder - Find Your Perfect Rental Property</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-bold text-gray-800 mb-4">
                <i class="fas fa-home text-blue-600"></i> Rental Finder
            </h1>
            <p class="text-xl text-gray-600">Find your perfect rental property with commute analysis</p>
        </div>

        <!-- Search Form -->
        <div class="bg-white rounded-2xl shadow-2xl p-8 mb-8">
            <form id="searchForm" class="space-y-6">
                <!-- Work Address -->
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-briefcase text-blue-500"></i> Work Address
                        </label>
                        <input type="text" id="workAddress" name="work_address" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="Enter your work address...">
                        <div id="workAddressSuggestions" class="absolute z-10 bg-white border rounded-lg shadow-lg mt-1 hidden"></div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-map-marker-alt text-green-500"></i> Preferred Suburbs
                        </label>
                        <input type="text" id="suburbs" name="suburbs"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="Enter suburbs (e.g., Surry Hills, Bondi)...">
                        <div id="suburbSuggestions" class="absolute z-10 bg-white border rounded-lg shadow-lg mt-1 hidden"></div>
                    </div>
                </div>

                <!-- Property Requirements -->
                <div class="grid md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Bedrooms</label>
                        <select name="bedrooms" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                            <option value="">Any</option>
                            <option value="1">1+</option>
                            <option value="2">2+</option>
                            <option value="3">3+</option>
                            <option value="4">4+</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Bathrooms</label>
                        <select name="bathrooms" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                            <option value="">Any</option>
                            <option value="1">1+</option>
                            <option value="2">2+</option>
                            <option value="3">3+</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Parking</label>
                        <select name="parking" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                            <option value="">Any</option>
                            <option value="1">1+</option>
                            <option value="2">2+</option>
                            <option value="3">3+</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Max Price/Week</label>
                        <input type="number" name="max_price" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                               placeholder="$500">
                <!-- Additional Features -->
                <div class="grid md:grid-cols-4 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Air Conditioning</label>
                        <select name="aircon" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                            <option value="">No preference</option>
                            <option value="required">Required</option>
                            <option value="preferred">Preferred</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Flooring</label>
                        <select name="flooring" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                            <option value="">No preference</option>
                            <option value="floorboards">Floorboards</option>
                            <option value="carpet">Carpet</option>
                            <option value="tiles">Tiles</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Property Orientation</label>
                        <select name="orientation" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                            <option value="">No preference</option>
                            <option value="north">North-facing</option>
                            <option value="south">South-facing</option>
                            <option value="east">East-facing</option>
                            <option value="west">West-facing</option>
                            <option value="northeast">Northeast-facing</option>
                            <option value="northwest">Northwest-facing</option>
                            <option value="southeast">Southeast-facing</option>
                            <option value="southwest">Southwest-facing</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Transport Mode</label>
                        <select name="transport" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                            <option value="driving">Driving</option>
                            <option value="transit">Public Transport</option>
                            <option value="walking">Walking</option>
                            <option value="bicycling">Cycling</option>
                        </select>
                    </div>
                </div>
                </div>

                <!-- Search Button -->
                <div class="text-center">
                    <button type="submit" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-12 py-4 rounded-full text-lg font-semibold hover:from-blue-700 hover:to-indigo-700 transform hover:scale-105 transition-all duration-200 shadow-lg">
                        <i class="fas fa-search mr-2"></i> Find Properties
                    </button>
                </div>
            </form>
        </div>

        <!-- Loading Indicator -->
        <div id="loading" class="hidden text-center py-8">
            <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600"></div>
            <p class="mt-4 text-gray-600">Searching properties and analyzing commute times...</p>
        </div>

        <!-- Results Table -->
        <div id="results" class="hidden bg-white rounded-2xl shadow-2xl overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white p-6">
                <h2 class="text-2xl font-bold">
                    <i class="fas fa-list mr-2"></i> Property Comparison Results
                </h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Property</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price/Week</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bed/Bath/Park</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Features</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Commute Time</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Commute Cost</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Details</th>
                        </tr>
                    </thead>
                    <tbody id="resultsBody" class="bg-white divide-y divide-gray-200">
                        <!-- Results will be populated here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Search form submission
        $('#searchForm').on('submit', function(e) {
            e.preventDefault();
            $('#loading').removeClass('hidden');
            $('#results').addClass('hidden');
            
            $.ajax({
                url: 'search.php',
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#loading').addClass('hidden');
                    $('#results').removeClass('hidden');
                    $('#resultsBody').html(response);
                },
                error: function() {
                    $('#loading').addClass('hidden');
                    alert('Search failed. Please try again.');
                }
            });
        });

        // Suburb autocomplete
        $('#suburbs').on('input', function() {
            const query = $(this).val();
            if (query.length > 2) {
                $.ajax({
                    url: 'autocomplete_suburbs.php',
                    method: 'GET',
                    data: { q: query },
                    success: function(response) {
                        $('#suburbSuggestions').html(response).removeClass('hidden');
                    }
                });
            } else {
                $('#suburbSuggestions').addClass('hidden');
            }
        });

        // Work address autocomplete
        $('#workAddress').on('input', function() {
            const query = $(this).val();
            if (query.length > 3) {
                $.ajax({
                    url: 'autocomplete_address.php',
                    method: 'GET',
                    data: { q: query },
                    success: function(response) {
                        $('#workAddressSuggestions').html(response).removeClass('hidden');
                    }
                });
            } else {
                $('#workAddressSuggestions').addClass('hidden');
            }
        });

        // Hide suggestions when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('#suburbs, #suburbSuggestions').length) {
                $('#suburbSuggestions').addClass('hidden');
            }
            if (!$(e.target).closest('#workAddress, #workAddressSuggestions').length) {
                $('#workAddressSuggestions').addClass('hidden');
            }
        });
    </script>
</body>
</html>
