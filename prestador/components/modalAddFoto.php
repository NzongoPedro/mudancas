<!-- Modal -->
<div class="modal fade" id="modalAddFoto" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalAddFotoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddFotoLabel">Adicionar foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-foto" enctype="multipart/form-data">

                    <div class="foto-post form-group mb-3 mt-2 shadow border-1 p-3 bg-secondary">
                        <label class="input-personalizado">
                            <span class="botao-selecionar">
                                <i class="ni ni-image mr-4"></i>
                                selecione uma foto
                            </span>
                            <img class="imagem" />
                            <input type="file" name="foto-prestador" class="input-file" accept="image" required>
                        </label>
                    </div>

                    <div class="form-foto-response"></div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Limpar formulário</button>
                        <button type="submit" class="btn btn-primary button-post">Adicionar</button>
                        <input type="hidden" name="id-prestrador" value="<?= $prestador->idprestador ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>