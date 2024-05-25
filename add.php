<!-- add_recipe.php -->

<?php
include("inc/head.inc.php");
// Mengambil data dari form
$recipeName = $conn->real_escape_string($_POST['recipeName'] ?? '');
$recipeContent = $conn->real_escape_string($_POST['recipeContent'] ?? '');
if($_POST['add'] ?? ''){
// Menyimpan data ke database
$sql = "INSERT INTO recipe VALUES (null, '$recipeName', '$recipeContent')";

if ($conn->query($sql) === TRUE) {
    echo "Resep berhasil ditambahkan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
?>


    <h2>Tambah Recipe</h2>
   
 <div class="card">
  <div class="card-body">
    <form action="" method="POST">
        <div class="mb-3">
            <label for="recipeName" class="form-label">Nama Resep</label>
            <input type="text" class="form-control" name="recipeName" required>
        </div>
        <div class="mb-3">
            <label for="recipeContent" class="form-label">Isi Resep</label>
            <textarea id="editor" class="form-control" name="recipeContent" rows="10" required></textarea>
        </div>
        <input type="submit" name="add" class="btn btn-primary" value="Tambah resep">
    </form>
    </div>
    </div>
    
    
<script>
  ClassicEditor
    .create( document.querySelector( '#editor' ), {
        toolbar: [ 'undo', 'redo', 'bold', 'italic', 'underline', 'strikethrough', 'bulletedList', 'numberedList' ],
        editorConfig: {
            height: '300px' // Atur tinggi sesuai kebutuhan
        }
    } )
    .catch( error => {
        console.error( error );
    } );
</script>

    
<?php
include("inc/foot.inc.php");
?>