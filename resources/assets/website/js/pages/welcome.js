
/**
 * | Choices for welcome page
 */

const options = [
    '.alugar',
]
const choices = options.map((e) => new window.Choices(e, {
    removeItems: true,
    searchEnabled: true,
    searchChoices: true,
    renderChoiceLimit: 2,
    maxItemCount: 2,
    noResultsText: `Sem opções por selecionar`,
    itemSelectText: 'Selecionar',
    noChoicesText: `Sem opções por selecionar`,
    classNames: {
        containerInner: ["choices__inner text-truncate"],
    },
    allowHTML: false,
    duplicateItemsAllowed: false,
}));
