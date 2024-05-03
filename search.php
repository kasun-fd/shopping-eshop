<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="search-container">
        <input type="text" id="search-bar" placeholder="Search...">
        <ul id="search-results">
        </ul>
    </div>


    <script>
        const searchContainer = document.getElementById("search-container");
        const searchBar = document.getElementById("search-bar");
        const searchResults = document.getElementById("search-results");

        // Function to hide the dropdown
        function hideDropdown() {
            searchResults.style.display = "none";
        }

        // Close the dropdown when clicking outside
        document.addEventListener("click", function(event) {
            if (!searchContainer.contains(event.target) && event.target !== searchBar) {
                hideDropdown();
            }
        });

        // Show the dropdown on search bar focus
        searchBar.addEventListener("focus", function() {
            searchResults.style.display = "block";
        });

        // Hide the dropdown on search bar blur (optional)
        searchBar.addEventListener("blur", function() {
            hideDropdown();
        });
    </script>
</body>

</html>