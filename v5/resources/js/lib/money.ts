import Decimal from 'decimal.js'

export function formatMoney(
    value: Decimal.Value | null | undefined,
    currency = 'MZN',
    locale = 'pt-MZ',
    fractionDigits = 2,
): string {
    if (value === null || value === undefined || value === '') {
        return ''
    }

    try {
        const decimal = new Decimal(value)

        if (!decimal.isFinite()) {
            return ''
        }

        const rounded = decimal.toDecimalPlaces(
            fractionDigits,
            Decimal.ROUND_HALF_UP,
        )

        return new Intl.NumberFormat(locale, {
            style: 'currency',
            currency,
            currencyDisplay: 'code',
            minimumFractionDigits: fractionDigits,
            maximumFractionDigits: fractionDigits,
        }).format(rounded.toNumber())
    } catch {
        return ''
    }
}
