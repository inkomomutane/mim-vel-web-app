const options = [
    '.bairros',
    '.tipos',
    '.condicao',
    '.estado',
    '.alugar'
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
    classNames: {
        containerInner: ["choices__inner text-truncate"],
    }

}));

function clearFormChoices() {
    choices.forEach((e) => e.removeActiveItems());
    let textInputs = document.querySelectorAll('input[type="text"]');
    textInputs.forEach((e) => console.log(e.value = ''));
}
document.querySelector("#clearFormChoices").addEventListener("click", clearFormChoices, true);


const fields = ['ano', 'area','quartos','suites','banheiros','piscinas','garagens','andares'];
fields.map((e) => new window.IMask(document.getElementById(e), {
    mask: 'num',
    blocks: {
        num: {
            mask: '[000000000]',
        }
    }
}));
const currencyMask = ['min_price','max_price'];
const masks = currencyMask.map((e)=>new IMask(
    document.getElementById(e), {
        mask: '(MZN) num',
        blocks: {
            num: {
                mask: Number,
                thousandsSeparator: '.',
            }
        }
    }));
