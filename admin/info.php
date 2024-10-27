<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <!-- Basic Bootstrap Table -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Blog Info</h5>
                <a href="?p=info_form&info=add" class="btn btn-primary">Add Info</a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Info</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php
                        $no = 1;
                        $query = $kon->query("SELECT * FROM text_snippets ORDER BY id DESC");
                        foreach ($query as $key) { ?>
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= $no ?></strong></td>
                                <td><textarea class="form-control" readonly><?= htmlspecialchars($key['text_content']) ?></textarea></td>
                                <td>
                                    <a href="?p=info_form&info=edit&id=<?= $key['id'] ?>" class="btn btn-primary">Edit</a>
                                    <button data-bs-target="#deleteInfoModal<?= $no ?>" data-bs-toggle="modal" class="btn btn-danger" type="button">Hapus</button>
                                </td>
                            </tr>


                            <!-- Delete Category Modal -->
                            <div class="modal fade" id="deleteInfoModal<?= $no ?>" tabindex="-1" aria-labelledby="deleteInfoModalLabel<?= $no ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteInfoModalLabel<?= $no ?>">Hapus Info</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah Anda yakin ingin menghapus info ini ?</p>
                                            <p class="text-muted">Tindakan ini tidak dapat dibatalkan.</p>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-between">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <a href="action.php?info=delete&id=<?= $key['id'] ?>" class="btn btn-danger">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <hr class="my-5" />
        <!--/ Basic Bootstrap Table -->

        <!-- / Content -->
    </div>

    <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->