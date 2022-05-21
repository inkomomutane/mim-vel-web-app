const { now } = require("lodash");
const printJS = require("print-js");
import "moment";
import moment from "moment";


$(document).ready(function () {
   function datatable(table) {
       $(table).DataTable({
           language: {
               "emptyTable": "Nenhum registro encontrado",
               "info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
               "infoEmpty": "Mostrando 0 até 0 de 0 registros",
               "infoFiltered": "(Filtrados de _MAX_ registros)",
               "infoThousands": ".",
               "loadingRecords": "Carregando...",
               "processing": "Processando...",
               "zeroRecords": "Nenhum registro encontrado",
               "search": "Pesquisar",
               "paginate": {
                   "next": "Próximo",
                   "previous": "Anterior",
                   "first": "Primeiro",
                   "last": "Último"
               },
               "aria": {
                   "sortAscending": ": Ordenar colunas de forma ascendente",
                   "sortDescending": ": Ordenar colunas de forma descendente"
               },
               "select": {
                   "rows": {
                       "_": "Selecionado %d linhas",
                       "1": "Selecionado 1 linha"
                   },
                   "cells": {
                       "1": "1 célula selecionada",
                       "_": "%d células selecionadas"
                   },
                   "columns": {
                       "1": "1 coluna selecionada",
                       "_": "%d colunas selecionadas"
                   }
               },
               "buttons": {
                   "copySuccess": {
                       "1": "Uma linha copiada com sucesso",
                       "_": "%d linhas copiadas com sucesso"
                   },
                   "collection": "Coleção  <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
                   "colvis": "Visibilidade da Coluna",
                   "colvisRestore": "Restaurar Visibilidade",
                   "copy": "Copiar",
                   "copyKeys": "Pressione ctrl ou u2318 + C para copiar os dados da tabela para a área de transferência do sistema. Para cancelar, clique nesta mensagem ou pressione Esc..",
                   "copyTitle": "Copiar para a Área de Transferência",
                   "csv": "CSV",
                   "excel": "Excel",
                   "pageLength": {
                       "-1": "Mostrar todos os registros",
                       "_": "Mostrar %d registros"
                   },
                   "pdf": "PDF",
                   "print": "Imprimir",
                   "createState": "Criar estado",
                   "removeAllStates": "Remover todos os estados",
                   "removeState": "Remover",
                   "renameState": "Renomear",
                   "savedStates": "Estados salvos",
                   "stateRestore": "Estado %d",
                   "updateState": "Atualizar"
               },
               "autoFill": {
                   "cancel": "Cancelar",
                   "fill": "Preencher todas as células com",
                   "fillHorizontal": "Preencher células horizontalmente",
                   "fillVertical": "Preencher células verticalmente"
               },
               "lengthMenu": "Exibir _MENU_ resultados por página",
               "searchBuilder": {
                   "add": "Adicionar Condição",
                   "button": {
                       "0": "Construtor de Pesquisa",
                       "_": "Construtor de Pesquisa (%d)"
                   },
                   "clearAll": "Limpar Tudo",
                   "condition": "Condição",
                   "conditions": {
                       "date": {
                           "after": "Depois",
                           "before": "Antes",
                           "between": "Entre",
                           "empty": "Vazio",
                           "equals": "Igual",
                           "not": "Não",
                           "notBetween": "Não Entre",
                           "notEmpty": "Não Vazio"
                       },
                       "number": {
                           "between": "Entre",
                           "empty": "Vazio",
                           "equals": "Igual",
                           "gt": "Maior Que",
                           "gte": "Maior ou Igual a",
                           "lt": "Menor Que",
                           "lte": "Menor ou Igual a",
                           "not": "Não",
                           "notBetween": "Não Entre",
                           "notEmpty": "Não Vazio"
                       },
                       "string": {
                           "contains": "Contém",
                           "empty": "Vazio",
                           "endsWith": "Termina Com",
                           "equals": "Igual",
                           "not": "Não",
                           "notEmpty": "Não Vazio",
                           "startsWith": "Começa Com",
                           "notContains": "Não contém",
                           "notStarts": "Não começa com",
                           "notEnds": "Não termina com"
                       },
                       "array": {
                           "contains": "Contém",
                           "empty": "Vazio",
                           "equals": "Igual à",
                           "not": "Não",
                           "notEmpty": "Não vazio",
                           "without": "Não possui"
                       }
                   },
                   "data": "Data",
                   "deleteTitle": "Excluir regra de filtragem",
                   "logicAnd": "E",
                   "logicOr": "Ou",
                   "title": {
                       "0": "Construtor de Pesquisa",
                       "_": "Construtor de Pesquisa (%d)"
                   },
                   "value": "Valor",
                   "leftTitle": "Critérios Externos",
                   "rightTitle": "Critérios Internos"
               },
               "searchPanes": {
                   "clearMessage": "Limpar Tudo",
                   "collapse": {
                       "0": "Painéis de Pesquisa",
                       "_": "Painéis de Pesquisa (%d)"
                   },
                   "count": "{total}",
                   "countFiltered": "{shown} ({total})",
                   "emptyPanes": "Nenhum Painel de Pesquisa",
                   "loadMessage": "Carregando Painéis de Pesquisa...",
                   "title": "Filtros Ativos",
                   "showMessage": "Mostrar todos",
                   "collapseMessage": "Fechar todos"
               },
               "thousands": ".",
               "datetime": {
                   "previous": "Anterior",
                   "next": "Próximo",
                   "hours": "Hora",
                   "minutes": "Minuto",
                   "seconds": "Segundo",
                   "amPm": [
                       "am",
                       "pm"
                   ],
                   "unknown": "-",
                   "months": {
                       "0": "Janeiro",
                       "1": "Fevereiro",
                       "10": "Novembro",
                       "11": "Dezembro",
                       "2": "Março",
                       "3": "Abril",
                       "4": "Maio",
                       "5": "Junho",
                       "6": "Julho",
                       "7": "Agosto",
                       "8": "Setembro",
                       "9": "Outubro"
                   },
                   "weekdays": [
                       "Domingo",
                       "Segunda-feira",
                       "Terça-feira",
                       "Quarta-feira",
                       "Quinte-feira",
                       "Sexta-feira",
                       "Sábado"
                   ]
               },
               "editor": {
                   "close": "Fechar",
                   "create": {
                       "button": "Novo",
                       "submit": "Criar",
                       "title": "Criar novo registro"
                   },
                   "edit": {
                       "button": "Editar",
                       "submit": "Atualizar",
                       "title": "Editar registro"
                   },
                   "error": {
                       "system": "Ocorreu um erro no sistema (<a target=\"\\\" rel=\"nofollow\" href=\"\\\">Mais informações<\/a>)."
                   },
                   "multi": {
                       "noMulti": "Essa entrada pode ser editada individualmente, mas não como parte do grupo",
                       "restore": "Desfazer alterações",
                       "title": "Multiplos valores",
                       "info": "Os itens selecionados contêm valores diferentes para esta entrada. Para editar e definir todos os itens para esta entrada com o mesmo valor, clique ou toque aqui, caso contrário, eles manterão seus valores individuais."
                   },
                   "remove": {
                       "button": "Remover",
                       "confirm": {
                           "_": "Tem certeza que quer deletar %d linhas?",
                           "1": "Tem certeza que quer deletar 1 linha?"
                       },
                       "submit": "Remover",
                       "title": "Remover registro"
                   }
               },
               "decimal": ",",
               "stateRestore": {
                   "creationModal": {
                       "button": "Criar",
                       "columns": {
                           "search": "Busca de colunas",
                           "visible": "Visibilidade da coluna"
                       },
                       "name": "Nome:",
                       "order": "Ordernar",
                       "paging": "Paginação",
                       "scroller": "Posição da barra de rolagem",
                       "search": "Busca",
                       "searchBuilder": "Mecanismo de busca",
                       "select": "Selecionar",
                       "title": "Criar novo estado",
                       "toggleLabel": "Inclui:"
                   },
                   "duplicateError": "Já existe um estado com esse nome",
                   "emptyError": "Não pode ser vazio",
                   "emptyStates": "Nenhum estado salvo",
                   "removeConfirm": "Confirma remover %s?",
                   "removeError": "Falha ao remover estado",
                   "removeJoiner": "e",
                   "removeSubmit": "Remover",
                   "removeTitle": "Remover estado",
                   "renameButton": "Renomear",
                   "renameLabel": "Novo nome para %s:",
                   "renameTitle": "Renomear estado"
               }
           },
           responsive: true,
           lengthMenu: [
               [5,10,15,20, 25, 50,100, -1 ],
               ['5', '10','15','20', '25', '50','100', 'Show all' ]
           ],
           "bLengthChange" : false,
           "bInfo":false,
       });
   }
    // datatable('#example');
    datatable('#users_table');
    datatable('#categories_table');
    // datatable('#periods_table');
    // datatable('#civil_states_table');
    // datatable('#payment_phases_table');
    // datatable('#students_table');
    // datatable('#veicle_classes_table');
    // datatable('#exam_types_table');
    // datatable('#class_rooms_table');
    // datatable('#dashboard_payments_tables');


    // const date = new Date('12/31/2001');
    //  date.setYear((new Date().getFullYear() - 15));
    // // console.log(date);

    // $('#birth_day').daterangepicker({
    //     singleDatePicker:true,
    //     maxDate:date,
    //     startDate: date,
    //     showDropdowns: true,
    //     autoUpdateInput:true,
    //     drops: "auto"
    // });

    // $('#dates').daterangepicker({
    //     showDropdowns : true,
    //     autoUpdateInput:true,
    //     locale: {
    //         format: 'D-MM-Y',
    //         separator: " to "
    //     },
    //     ranges: {
    //         'Hoje': [moment(), moment()],
    //         'Ontem': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
    //         'Últimos 7 Dias': [moment().subtract(6, 'days'), moment()],
    //         'Últimos 30 Dias': [moment().subtract(29, 'days'), moment()],
    //         'Este mês': [moment().startOf('month'), moment().endOf('month')],
    //         'Mês passado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    //      }
    // });

    // const biDate =  new Date();
    // biDate.setYear((new Date().getFullYear() - 5));
    // $('#id_emision_date').daterangepicker({
    //     singleDatePicker:true,
    //     maxDate:new Date(),
    //     startDate: biDate,
    //     minDate: biDate,
    //     showDropdowns: true,
    //     autoUpdateInput:true,
    //     drops: "auto"
    // });


    // $('#init_at').timepicker({
    //     use24hours: true,
    //     showMeridian: false,
    //     timeFormat: 'H:i',
    //     disableTimeRanges:[['0:00', '5:30'], ['21:00', '23:59']]
    // });
    // $('#end_at').timepicker({
    //     use24hours: true,
    //     showMeridian: false,
    //     timeFormat: 'H:i',
    //     disableTimeRanges:[['0:00', '5:30'], ['21:00', '23:59']]
    // });
});

