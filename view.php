<?php
include("inc/head.inc.php");
?>
<nav class="navbar navbar-expand-lg bg-light-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"> ⟨⟨ </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor04" aria-controls="navbarColor04" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
 
  </div>
</nav>
<?php 
// Ambil ID resep dari URL
$recipeId = $_GET["id"];

// Buat query SQL untuk mendapatkan informasi resep berdasarkan ID
$sql = "SELECT * FROM recipe WHERE id = $recipeId";
$recipe = $conn->query($sql);
$recipee = $conn->query("SELECT * FROM recipe WHERE id = $recipeId");
while($exee = $recipee->fetch_object()){
    echo '<center>
    <h2>'.$exee->name.'</h2>
    </center>';
}
?>

<table class="table responsive">
    <thead>
        <tr>
            <th>NAMA BAHAN</th>
            <th><center>UNIT</center></th>
        </tr>
    </thead>
    <tbody>
<?php
while($exe = $recipe->fetch_object()){
    echo '<title>:: Recipe '.$exe->name.'</title>';
    $pattern = explode("\n",$exe->material);
    foreach ($pattern as $data){
        echo "<tr>";
        $pattern1 = explode(",",$data);
        
        //var_dump($data);
        echo "<td>".$pattern1[0]."</td>";
        echo "<td><center>".$pattern1[1]."</center></td>";
        echo "</tr>";
    }
    
}
?>
    </tbody>
</table>
<?php
include("inc/foot.inc.php");
?>