<?php include("db.inc.php");?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="<?=$set->url_themes;?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.0/classic/ckeditor.js"></script>
    <style>
        /* Add custom styles here if needed */
        table,th,td {
            border: 1px solid gray;
        }
         /* CSS untuk memperbesar textarea */
  .ck-editor__editable {
    min-height: 200px; /* Atur tinggi sesuai kebutuhan */
  }
    </style>
</head>
<body style="margin:9px">
<div class="container mt-4">