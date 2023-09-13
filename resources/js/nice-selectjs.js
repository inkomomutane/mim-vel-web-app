import "../../node_modules/nice-select2/dist/css/nice-select2.css";
import "../../node_modules/nice-select2/dist/js/nice-select2.js";
let tipoDeImovelOptions = {
    searchable: true,
    placeholder: "Tipo de imóvel",
    searchtext: "Pesquisar...",
    selectedtext: 'selected'
};
NiceSelect.bind(
    document.getElementById("tipo-de-imovel-select"),
    tipoDeImovelOptions
);

let bairrosOptions = {
    searchable: true,
    placeholder: "Bairros",
    searchtext: "Pesquisar...",
    selectedtext: 'selected'
};
NiceSelect.bind(document.getElementById("bairros-select"), bairrosOptions);
