/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************************!*\
  !*** ./resources/assets/website/js/pages/posts.js ***!
  \****************************************************/
var options = ['.bairros', '.tipos', '.condicao', '.estado', '.alugar', '.bairros-mobile', '.tipos-mobile', '.condicao-mobile', '.estado-mobile', '.alugar-mobile'];
var choices = options.map(function (e) {
  return new Choices(e, {
    removeItemButton: true,
    removeItems: true,
    searchEnabled: true,
    searchChoices: true,
    noResultsText: "Sem ".concat(e, " por selecionar"),
    itemSelectText: 'Selecionar',
    noChoicesText: "Sem ".concat(e, " por selecionar"),
    allowHTML: false,
    duplicateItemsAllowed: false,
    classNames: {
      containerInner: ["choices__inner text-truncate"]
    }
  });
});

function clearFormChoices() {
  choices.forEach(function (e) {
    return e.removeActiveItems();
  });
  var textInputs = document.querySelectorAll('input[type="text"]');
  textInputs.forEach(function (e) {
    return console.log(e.value = '');
  });
}

document.querySelector("#clearFormChoices").addEventListener("click", clearFormChoices, true);
var fields = ['ano', 'area', 'quartos', 'suites', 'banheiros', 'piscinas', 'garagens', 'andares', 'ano-mobile', 'area-mobile', 'quartos-mobile', 'suites-mobile', 'banheiros-mobile', 'piscinas-mobile', 'garagens-mobile', 'andares-mobile'];
fields.map(function (e) {
  return new window.IMask(document.getElementById(e), {
    mask: 'num',
    blocks: {
      num: {
        mask: '[000000000]'
      }
    }
  });
});
var currencyMask = ['min_price', 'max_price', 'min_price-mobile', 'max_price-mobile'];
var masks = currencyMask.map(function (e) {
  return new IMask(document.getElementById(e), {
    mask: '(MZN) num',
    blocks: {
      num: {
        mask: Number,
        thousandsSeparator: '.'
      }
    }
  });
});
/******/ })()
;