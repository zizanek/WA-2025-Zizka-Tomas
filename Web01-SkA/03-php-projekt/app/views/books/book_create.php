<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přidat knihu</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body class="bg-light">

    <div class="container mt-5">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Knihovna</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Přepnout navigaci">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../../views/books/book_create.php">Přidat knihu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../controllers/book_list.php">Výpis knih</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Přidat novou knihu</h2>
                    </div>
                    <div class="card-body">
                        <form action="../../controllers/BookController.php" method="post" enctype="multipart/form-data">
                            
                            <div class="mb-3">
                                <label for="title" class="form-label">Název knihy: <span class="text-danger">*</span></label>
                                <input type="text" id="title" name="title" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="author" class="form-label">Autor: <span class="text-danger">*</span></label>
                                <input type="text" id="author" name="author" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Kategorie:</label>
                                <input type="text" id="category" name="category" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="subcategory" class="form-label">Podkategorie:</label>
                                <input type="text" id="subcategory" name="subcategory" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="year" class="form-label">Rok vydání: <span class="text-danger">*</span></label>
                                <input type="number" id="year" name="year" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Cena: <span class="text-danger">*</span></label>
                                <input type="number" id="price" name="price" class="form-control" step="0.01" required>
                            </div>

                            <div class="mb-3">
                                <label for="isbn" class="form-label">ISBN: <span class="text-danger">*</span></label>
                                <input type="text" id="isbn" name="isbn" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Popis:</label>
                                <textarea id="description" name="description" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="link" class="form-label">Odkaz:</label>
                                <input type="url" id="link" name="link" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="images" class="form-label">Obrázky (můžete nahrát více):</label>
                                <input type="file" id="images" name="images[]" class="form-control" multiple accept="image/*">
                            </div>

                            <button type="submit" class="btn btn-success w-100">Uložit knihu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>