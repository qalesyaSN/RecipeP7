</div>

<!-- jQuery script -->
<script src="/js/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function(){
        // Fungsi untuk melakukan pencarian saat input berubah
        $("#searchInput").on("input", function(){
            var searchQuery = $(this).val();

            // Lakukan AJAX request ke file PHP untuk melakukan pencarian
            $.ajax({
                method: "POST",
                url: "search.php", // Ganti dengan nama file PHP untuk melakukan pencarian
                data: { query: searchQuery },
                success: function(response){
                    // Tampilkan hasil pencarian di div #searchResults
                    $("#searchResults").html(response);

                    // Tambahkan event click pada hasil pencarian
                    $(".recipe-card").on("click", function(){
                        var recipeId = $(this).data("recipe-id");
                        window.location.href = "view.php?id=" + recipeId;
                    });
                }
            });
        });
    });
</script>
</body>
</html>
