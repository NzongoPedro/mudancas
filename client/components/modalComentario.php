<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Comentários</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container coment-div border-0 rounded-0 alert alert-secondary" style="height: 400px; overflow:hidden; overflow-y:scroll;">
                </div>
                <div class="alert alert-secondary border-0">
                    <form action="" class="comentar-post">
                        <div class="row w-100">
                            <div class="col-10">
                                <input type="text" name="comentario" class="form-control form-control-lg ic" placeholder="Escreva aqui o seu comentário ..." required>
                            </div>
                            <div class="col-2">
                                <input type="submit" class="btn btn-primary btn-lg" value="comentar">
                                <input type="hidden" name="id-cliente" value="<?= $id_cliente ?>">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>