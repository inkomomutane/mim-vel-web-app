import IMask from 'imask';
//
const currencyMask = new IMask(
    document.getElementById('preco_imovel'), {
        mask: '(MZN) num',
        blocks: {
            num: {
                mask: Number,
                thousandsSeparator: '.',
                placeholderChar: "M"

            }
        }
    });

const fields = ['ano', 'area','quartos','suites','banheiros','piscinas','garagens','andares'];
fields.map((e) => new IMask(document.getElementById(e), {
    mask: 'num',
    blocks: {
        num: {
            mask: Number,
        }
    }
}));
