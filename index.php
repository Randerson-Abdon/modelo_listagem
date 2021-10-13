<?php
//conexão com banco de dados
include_once("conexao.php");

?>
<style>
  section .content {
    margin-top: -150px;
    margin-bottom: -170px;
  }

  p {
    color: #d70000;
    margin-left: 20px;
  }

  .teste::-webkit-input-placeholder {
    /* WebKit browsers */
    color: #3995f0;
  }

  .teste:-moz-placeholder {
    /* Mozilla Firefox 4 to 18 */
    color: #3995f0;
    opacity: 1;
  }

  .teste::-moz-placeholder {
    /* Mozilla Firefox 19+ */
    color: #3995f0;
    opacity: 1;
  }

  .teste:-ms-input-placeholder {
    /* Internet Explorer 10+ */
    color: #3995f0;
  }
</style>

<!DOCTYPE HTML>
<html>

<head>

  <!-- Conexão cnd com bootstrap 05 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  <!-- LINK DO fontawesome via cdn(navegador) para icones -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

  <!-- Conexão cnd com jquery se necessario -->
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

  <meta charset="utf-8">
  <title>Modelo de Crud</title>
</head>

<body>



  <div class="container ml-4" style="margin-top: -30px;">

    <br>

    <div class="content">
      <div class="row mr-3">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
              <div class="table-responsive">


                <?php
                $uc = '1461';

                //consulta para exibição de dados
                $query = "SELECT * from historico_financeiro where id_unidade_consumidora = '$uc' and data_pagamento_fatura is null order by mes_faturado desc";
                $result = mysqli_query($conexao, $query);

                $linha = mysqli_num_rows($result);
                $linha_count = mysqli_num_rows($result);

                if ($linha == '') {
                  echo "<h3 class='text-danger'> Não foram encontrados registros com esses parametros.";
                } else {

                ?>

                  <form action="" method="" target="_blank">
                    <div style="overflow: strcoll; height: 500px;">
                      <table class="table table-sm">
                        <thead class="text-secondary">

                          <ul class="text-secondary">
                            <div class="row" style="margin-left: -40px;">
                              <div class="form-group col-md-3">
                                <input type="button" class="btn btn-info form-control mr-2" value="Ação 01" onclick="javascript:submitForm(this.form, 'rel_fatura.php');" />
                              </div>

                              <div class="form-group col-md-3">
                                <input type="button" class="btn btn-danger form-control mr-2" value="Ação 02" onclick="javascript:submitForm(this.form, 'rel_fatura.php');" />
                              </div>
                            </div>

                          </ul>

                          <th>
                            <div class="input-group-text">
                              <input type="checkbox" title="Selecionar Tudo" id="todos" name="all">
                            </div>
                          </th>

                          <th class="text-danger">
                            Competência
                          </th>
                          <th>
                            Tarifa
                          </th>
                          <th>
                            *M/J
                          </th>
                          <th>
                            Serviços
                          </th>
                          <th>
                            Parcelas
                          </th>
                          <th>
                            Faturado
                          </th>
                          <th>
                            Vencimento
                          </th>

                          <th>
                            Ações
                          </th>

                        </thead>
                        <tbody>

                          <?php
                          while ($res = mysqli_fetch_array($result)) {
                            $mes_faturado        = $res["mes_faturado"];
                            $total_geral_tarifa  = $res["total_geral_tarifa"];
                            $total_multa_juros_estimados        = $res["total_multa_juros_estimados"];
                            $total_servicos_requeridos        = $res["total_servicos_requeridos"];
                            $total_parcela_acordo        = $res["total_parcela_acordo"];
                            $total_geral_faturado        = $res["total_geral_faturado"];
                            $data_vencimento_fatura        = $res["data_vencimento_fatura"];

                          ?>

                            <tr>

                              <td>

                                <div class="input-group-text">
                                  <input class="lista" type="checkbox" title="Selecionar Atual" name="fatura[]" value="<?php echo $mes_faturado; ?>">
                                </div>

                              </td>

                              <td class="text-danger"><?php echo $mes_faturado; ?></td>
                              <td><?php echo $total_geral_tarifa; ?></td>
                              <td><?php echo $total_multa_juros_estimados; ?></td>
                              <td><?php echo $total_servicos_requeridos; ?></td>
                              <td><?php echo $total_parcela_acordo; ?></td>
                              <td><?php echo $total_geral_faturado; ?></td>
                              <td><?php echo $data_vencimento_fatura; ?></td>

                              <td>

                                <a class="btn btn-success btn-sm" title="Gerar Boleto" target="_blank" href="../lib/boleto/boleto_cef.php?id=<?php echo $id; ?>&mes_faturado=<?php echo $mes_faturado2; ?>&id_localidade=<?php echo $id_localidade; ?>&vencimento=<?php echo $vencimento; ?>&vencimento2=<?php echo $vencimento2; ?>"><i class="fas fa-file-invoice"></i></a>

                                <a class="btn btn-danger btn-sm" title="Baixa Manual" href="<?php echo $_SESSION['painel'] ?>.php?acao=confirma&id=<?php echo $id; ?>&mes_faturado=<?php echo $mes_faturado2; ?>&id_localidade=<?php echo $id_localidade; ?>"><i class="fas fa-donate"></i></a>

                              </td>

                            </tr>

                          <?php } ?>

                        </tbody>

                        <tfoot>
                          <tr>

                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>
                              <span class="text-muted">Registros: <?php echo $linha_count ?> </span>
                            </td>
                          </tr>

                        </tfoot>

                      </table>
                    </div>


                  </form>

                  <script>
                    //chamando função de soma dinamica de checkbox
                    $('input[type="checkbox"]').on('change', function() {
                      //declarando variaveis
                      var total = 0;
                      var valores = 0;
                      var selected = 0;
                      //pegando valores
                      $('input[type="checkbox"]:checked').each(function() {
                        //somando valores inteiros e boleanos
                        total += parseInt($(this).val());
                        valores += parseFloat($(this).data('valor'));
                        selected += 1;

                        if (selected >= 2) {
                          $('#avulso').show();
                        } else if (selected <= 1) {
                          $('#avulso').hide();
                        }

                      });
                      //enviando valores convertendo para moeda brasileira
                      $('input[name="totalValor"]').val(valores.toLocaleString('pt-br', {
                        style: 'currency',
                        currency: 'BRL'
                      }));
                      //$('.servicos').html(servicos);
                    });
                  </script>

                  <script type="text/javascript">
                    //post alternativo
                    function submitForm(form, action) {
                      form.action = action;
                      form.submit();
                    }
                  </script>
                  <script>
                    $(document).ready(function() {

                      $('#todos').click(function() {
                        var val = this.checked;
                        //aler(val);
                        $('.lista').each(function() {
                          $(this).prop('checked', val);

                        });

                      });

                    });
                  </script>

              </div>
            </div>
          </div>

        </div>

      </div>

      <!-- inicio do rodape de totalizações -->
      <table class="table table-sm table-bordered" style="color: #d70000; background-color: #ffffff; width: 97%;">
        <thead class="text-secondary">

          <th>
            Total Tarifa
          </th>
          <th>
            Total Multa
          </th>
          <th>
            Total Juros
          </th>
          <th>
            Total Serviços
          </th>
          <th>
            Total Parcelas
          </th>
          <th>
            Total Faturado
          </th>
          <th>
            Total Selecionado
          </th>


        </thead>
        <tbody>

          <?php
                  //fazer consultas para totalizações aqui

          ?>

          <tr>

            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><input type="text" name="totalValor" placeholder="Total" class="teste text-danger form-control mr-2 font-weight-bold" id="resultado" value=""></td>


          </tr>

        </tbody>
      </table>

    <?php
                }
    ?>

    </div>

  </div>


  <!--MASCARAS -->
  <script src="https://rawgit.com/RobinHerbots/Inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
  <script>
    $("input[id*='numero_cpf_cnpj']").inputmask({
      mask: ['999.999.999-99', '99.999.999/9999-99'],
      keepStatic: true
    });
  </script>
  <script>
    $("label[id*='numero_cpf_cnpj']").inputmask({
      mask: ['999.999.999-99', '99.999.999/9999-99'],
      keepStatic: true
    });
  </script>
  <script>
    $("span[id*='numero_cpf_cnpj']").inputmask({
      mask: ['999.999.999-99', '99.999.999/9999-99'],
      keepStatic: true
    });
  </script>
  <script>
    $("td[id*='numero_cpf_cnpj']").inputmask({
      mask: ['999.999.999-99', '99.999.999/9999-99'],
      keepStatic: true
    });
  </script>
  <script>
    $("label[id*='cel']").inputmask({
      mask: ['(99) 99999-9999'],
      keepStatic: true
    });
  </script>
  <script>
    $("label[id*='fone']").inputmask({
      mask: ['(99) 9999-9999'],
      keepStatic: true
    });
  </script>
  <script>
    $("input[id*='cel']").inputmask({
      mask: ['(99) 99999-9999'],
      keepStatic: true
    });
  </script>
  <script>
    $("td[id*='cel']").inputmask({
      mask: ['(99) 99999-9999'],
      keepStatic: true
    });
  </script>