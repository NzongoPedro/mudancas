<!-- Modal -->
<div class="modal fade" id="modalContrato" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalContratoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalContratoLabel">solicitação de serviço</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card bg-light rounded-0">
                    <div class="card-body">
                        <div class="card-title">
                            <h5>Formulário de contrato</h5>
                        </div>
                        <hr>
                        <form class="form-novo-contrato">
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="cliente" value="<?= $nomeCliente ?>" required placeholder="nome" readonly>
                                        <input type="hidden" name="id-cliente" value="<?= $idcliente ?>">
                                        <label for="cliente">Nome do cliente</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control servico" id="servicoEscolhido" required placeholder="Endereço final" readonly>
                                        <input type="hidden" name="id-servico" class="servico-input" value="">
                                        <label for="servicoEscolhido">Serviço escolhido</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="address" name="endereco-atual" class="form-control" id="enderecoAtual" required placeholder="Endereço atual">
                                        <label for="enderecoAtual">Endereço Atual</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="address" name="endereco-destino" class="form-control" id="enderecoFinal" required placeholder="Endereço final">
                                        <label for="enderecoFinal">Endereço final</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control prestador" id="prestador" value="" required placeholder="nome" readonly>
                                        <input type="hidden" name="id-prestador" class="prestador-input" value="">
                                        <label for="prestador">Prestador escolhido</label>
                                    </div>
                                </div>
                            </div>
                            <div class="response-contrato text-center"></div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-dark btn-lg rounded-0" type="Submit">Solicitar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>