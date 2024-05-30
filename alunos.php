<?php include 'header.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="assets/css/alunos.css">

<section class="home-section">
    <div class="container">
        <div class="text">Cadastro de Alunos</div>
        <?php if (isset($_GET['msg']) && $_GET['msg'] == 'success'): ?>
            <div id="alert-success" class="alert alert-success">Aluno adicionado com sucesso!</div>
        <?php elseif (isset($_GET['msg']) && $_GET['msg'] == 'updated'): ?>
            <div id="alert-success" class="alert alert-success">Aluno atualizado com sucesso!</div>
        <?php elseif (isset($_GET['msg']) && $_GET['msg'] == 'deleted'): ?>
            <div id="alert-danger" class="alert alert-danger">Aluno deletado com sucesso!</div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-6">
                <input type="text" id="search-input" placeholder="Pesquisar alunos..." class="form-control">
            </div>
            <div class="col-md-6 text-right">
                <button type="button" class="btn btn-primary btn-add" data-toggle="modal" data-target="#addModal">
                    + NOVO
                </button>
            </div>
        </div>

        <div class="table-responsive table-container">
            <table class="table table-striped" id="alunos-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Matrícula</th>
                        <th>Turma</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'db.php';
                    $sql = "SELECT * FROM alunos";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()):
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nome']; ?></td>
                            <td><?php echo $row['cpf']; ?></td>
                            <td><?php echo $row['matricula']; ?></td>
                            <td><?php echo $row['turma']; ?></td>
                            <td><?php echo $row['telefone']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td class="actions">
                                <a href="#" class="btn btn-success edit-btn" data-toggle="modal" data-target="#editModal"
                                    data-id="<?php echo $row['id']; ?>" data-nome="<?php echo $row['nome']; ?>"
                                    data-cpf="<?php echo $row['cpf']; ?>" data-matricula="<?php echo $row['matricula']; ?>"
                                    data-turma="<?php echo $row['turma']; ?>"
                                    data-telefone="<?php echo $row['telefone']; ?>"
                                    data-email="<?php echo $row['email']; ?>">Editar</a>
                                <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Deletar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Modal de Adição -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Adicionar Aluno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="process.php" method="POST">
                    <div class="input-group">
                        <label for="add-nome">Nome</label>
                        <input type="text" name="nome" id="add-nome" required>
                    </div>
                    <div class="input-group">
                        <label for="add-cpf">CPF</label>
                        <input type="text" name="cpf" id="add-cpf" required>
                    </div>
                    <div class="input-group">
                        <label for="add-matricula">Matrícula</label>
                        <input type="text" name="matricula" id="add-matricula" required>
                    </div>
                    <div class="input-group">
                        <label for="add-turma">Turma</label>
                        <input type="text" name="turma" id="add-turma" required>
                    </div>
                    <div class="input-group">
                        <label for="add-telefone">Telefone</label>
                        <input type="text" name="telefone" id="add-telefone" required>
                    </div>
                    <div class="input-group">
                        <label for="add-email">Email</label>
                        <input type="email" name="email" id="add-email" required>
                    </div>
                    <button type="submit" name="add" class="btn btn-primary">Adicionar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Edição -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Aluno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="process.php" method="POST">
                    <input type="hidden" name="id" id="edit-id">
                    <div class="input-group">
                        <label for="edit-nome">Nome</label>
                        <input type="text" name="nome" id="edit-nome" required>
                    </div>
                    <div class="input-group">
                        <label for="edit-cpf">CPF</label>
                        <input type="text" name="cpf" id="edit-cpf" required>
                    </div>
                    <div class="input-group">
                        <label for="edit-matricula">Matrícula</label>
                        <input type="text" name="matricula" id="edit-matricula" required>
                    </div>
                    <div class="input-group">
                        <label for="edit-turma">Turma</label>
                        <input type="text" name="turma" id="edit-turma" required>
                    </div>
                    <div class="input-group">
                        <label for="edit-telefone">Telefone</label>
                        <input type="text" name="telefone" id="edit-telefone" required>
                    </div>
                    <div class="input-group">
                        <label for="edit-email">Email</label>
                        <input type="email" name="email" id="edit-email" required>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    setTimeout(function () {
        var alertSuccess = document.getElementById('alert-success');
        var alertDanger = document.getElementById('alert-danger');
        if (alertSuccess) {
            alertSuccess.remove();
        }
        if (alertDanger) {
            alertDanger.remove();
        }
    }, 5000);

    $(document).ready(function () {
        $('.edit-btn').click(function () {
            var id = $(this).data('id');
            var nome = $(this).data('nome');
            var cpf = $(this).data('cpf');
            var matricula = $(this).data('matricula');
            var turma = $(this).data('turma');
            var telefone = $(this).data('telefone');
            var email = $(this).data('email');

            $('#edit-id').val(id);
            $('#edit-nome').val(nome);
            $('#edit-cpf').val(cpf);
            $('#edit-matricula').val(matricula);
            $('#edit-turma').val(turma);
            $('#edit-telefone').val(telefone);
            $('#edit-email').val(email);
        });

        $('#search-input').on('keyup', function () {
            var value = $(this).val().toLowerCase();
            $('#alunos-table tbody tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>