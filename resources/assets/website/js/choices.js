import Choices from 'Choices.js';

const options = [
    '.bairros',
    '.tipos',
    '.condicao',
    '.estado',
]
const choices = options.map((e) => new Choices(e,{
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

function clearFormChoices(){
    choices.forEach((e)=> e.removeActiveItems());
}
document.querySelector("#clearFormChoices").addEventListener("click", clearFormChoices, true)
