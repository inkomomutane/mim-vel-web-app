import IMask from 'imask';
const fields = ['ano', 'area','quartos','suites','banheiros','piscinas','garagens','andares'];
fields.map((e) => new IMask(document.getElementById(e), {
    mask: 'num',
    blocks: {
        num: {
            mask: Number,
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
