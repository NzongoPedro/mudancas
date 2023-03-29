<!-- Modal -->
<div class="modal fade" id="modalNewPost" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalNewPostLabel">Criar pubicação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" class="form-post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <input type="text" name="titulo-post" class="titulo-post form-control form-control-lg" placeholder="Título da publicação">
                    </div>
                    <br>
                    <div class="foto-post form-group mb-3 mt-2 shadow border-1 p-3 bg-secondary">
                        <label class="input-personalizado">
                            <span class="botao-selecionar">
                                <i class="ni ni-image mr-4"></i>
                                selecione um arquivo de mídia [FOTO OU VIDEO]
                            </span>
                            <img class="imagem" />
                            <input type="file" name="arquivo-post" class="input-file">
                        </label>
                    </div>
                    <div class="form-group">
                        <textarea name="conteudo-post" rows="5" class="form-control texto-post" placeholder="Escreva aqui o texto para a sua publicação"></textarea>
                    </div>
                    <div class="responseText"></div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Limpar formulário</button>
                        <button type="submit" class="btn btn-primary button-post">publicar</button>
                        <input type="hidden" name="id_prestrador-post" value="<?= $prestador->idprestador ?>">
                        <input type="hidden" name="id-post" class="id-post" value="">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>