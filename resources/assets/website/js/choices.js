import Choices from 'Choices.js';
const options = [
    '.bairros',
    '.tipos',
    '.condicao',
    '.estado',
    '.alugar',
]
const choices = options.map((e) => new Choices(e, {
    removeItemButton: true,
    removeItems: true,
    searchEnabled: true,
    searchChoices: true,
    noResultsText: `Sem ${e} por selecionar`,
    itemSelectText: 'Selecionar',
    noChoicesText: `Sem ${e} por selecionar`,
    allowHTML: false,
    duplicateItemsAllowed: false,

}));

function clearFormChoices() {
    choices.forEach((e) => e.removeActiveItems());
    let textInputs = document.querySelectorAll('input[type="text"]');
    textInputs.forEach((e) => console.log(e.value = ''));
}
document.querySelector("#clearFormChoices").addEventListener("click", clearFormChoices, true);

window.Choices = Choices;
