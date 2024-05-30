<?php include 'header.php'; ?>
<link rel="stylesheet" href="assets/css/emprestimo-de-chave.css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<section class="home-section">
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Empréstimo de Chaves</h2>
                    </div>
                    <div class="card-body">
                        <form action="processa_biblioteca.php" method="POST">
                            <div class="form-group">
                                <label for="id">ID da Chave:</label>
                                <input type="text" id="id" name="id" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="prateleira">Prateleira:</label>
                                <input type="text" id="prateleira" name="prateleira" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select id="status" name="status" class="form-control" required>
                                    <option value="disponivel">Disponível</option>
                                    <option value="indisponivel">Indisponível</option>
                                    <option value="emprestado">Emprestado</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

    
</section>
</body>
</html>
