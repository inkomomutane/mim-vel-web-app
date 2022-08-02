/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************************************!*\
  !*** ./resources/assets/website/js/pages/welcome.js ***!
  \******************************************************/
/**
 * | Choices for welcome page
 */
var options = ['.alugar'];
var choices = options.map(function (e) {
  return new window.Choices(e, {
    removeItems: true,
    searchEnabled: true,
    searchChoices: true,
    renderChoiceLimit: 2,
    maxItemCount: 2,
    noResultsText: "Sem op\xE7\xF5es por selecionar",
    itemSelectText: 'Selecionar',
    noChoicesText: "Sem op\xE7\xF5es por selecionar",
    classNames: {
      containerInner: ["choices__inner text-truncate"]
    },
    allowHTML: false,
    duplicateItemsAllowed: false
  });
});
/******/ })()
;