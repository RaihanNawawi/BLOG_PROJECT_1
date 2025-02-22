<div class="container mx-auto p-6">
  <!-- Search Form -->
  <h1 class="text-4xl font-extrabold mb-4 text-center">Search Articles</h1>
  <div class="relative mb-8 w-full">
    <input
      id="searchInput"
      type="text"
      placeholder="Enter keywords here"
      class="border border-gray-300 rounded-full py-2 px-4 focus:outline-none focus:ring focus:ring-gray-800 w-full" />
    <button
      id="searchButton"
      class="absolute right-0 top-0 h-full bg-black text-white rounded-full px-6 hover:bg-gray-800 transition-colors" type="submit">
      Search
    </button>
  </div>

  <!-- Search result -->
  <div class="flex items-center mt-4">
    <span class="bg-black text-white font-bold py-2 px-4 rounded">Search Result for <?php echo $keyword; ?> </span>
    <div class="flex-grow border-b border-zinc-800 ml-4"></div>
  </div>

  <script>
    //  JavaScript untuk mengaktifkan pencarian saat user menekan Enter
    function performSearch() {
      var keyword = document.getElementById('searchInput').value;

      if (keyword.trim() !== "") {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'searchresult.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
          if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('searchResults').innerHTML = xhr.responseText;
          }
        };
        xhr.send('keyword=' + encodeURIComponent(keyword));
      }
    }

    // Event listener untuk tombol search
    document.getElementById('searchButton').addEventListener('click', performSearch);

    // Event listener untuk tombol "Enter"
    document.getElementById('searchInput').addEventListener('keypress', function(e) {
      if (e.key === 'Enter') {
        performSearch();
      }
    });


  // JavaScript for handling AJAX request
  document.getElementById('searchButton').addEventListener('click', function() {
  var keyword = document.getElementById('searchInput').value;

  // Perform AJAX request to search.php
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'searchresult.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
  if (xhr.readyState == 4 && xhr.status == 200) {
  // Update searchResults with response from server
  document.getElementById('searchResults').innerHTML = xhr.responseText;
  }
  };
  xhr.send('keyword=' + encodeURIComponent(keyword));
  });
  </script>

  <!-- Container for search results -->
  <div id="searchResults" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
    <?php
    include 'searchresult.php';
    ?>
  </div>
</div>