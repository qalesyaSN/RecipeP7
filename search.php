<!-- search.php -->

<?php
include("inc/head.inc.php");
$searchQuery = $conn->real_escape_string($_POST["query"] ?? '');

    $sql = "SELECT id, name FROM recipe WHERE name LIKE '%$searchQuery%' ORDER BY name ASC";

    $result = $conn->query($sql);

    // Tampilkan hasil pencarian
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        echo "<div class='card mt-2 recipe-card' data-recipe-id='" . htmlspecialchars($row["id"]) . "'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title mb-0'><i class='fa-solid fa-book-open'></i> " . htmlspecialchars($row["name"]) . "</h5>";
        echo "</div>";
        echo "</div>";
    }
    } else {
        echo "Tidak ada hasil ditemukan";
    }
$conn->close();
include("inc/foot.inc.php");
?>
