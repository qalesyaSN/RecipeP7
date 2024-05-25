<!-- search.php -->

<?php
include("inc/head.inc.php");
// Ambil query pencarian dari AJAX request
$searchQuery = $conn->real_escape_string($_POST["query"] ?? '');
// Buat query SQL pencarian jika ada query

    $sql = "SELECT * FROM recipe WHERE name LIKE '%$searchQuery%' ORDER BY name ASC";

    $result = $conn->query($sql);

    // Tampilkan hasil pencarian
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        echo "<div class='card mt-2 recipe-card' data-recipe-id='" . $row["id"] . "'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title mb-0'><i class='fa-solid fa-book-open'></i> " . $row["name"] . "</h5>";
        echo "</div>";
        echo "</div>";
    }
    } else {
        echo "Tidak ada hasil ditemukan";
    }
$conn->close();
include("inc/foot.inc.php");
?>
