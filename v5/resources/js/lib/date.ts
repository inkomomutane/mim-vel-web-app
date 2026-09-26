import {
    parseDate,
    type DateValue,
} from '@internationalized/date';

export function parseIsoDate(
    value?: string | null,
): DateValue | null {
    if (!value) {
        return null;
    }

    try {
        return parseDate(value);
    } catch {
        return null;
    }
}

export function formatIsoDate(
    value?: string | null,
    locale = 'en-GB',
): string {
    const date = parseIsoDate(value);

    if (!date) {
        return '';
    }

    /**
     * Creating the Date at midday avoids accidental
     * previous-day conversion around timezone boundaries.
     */
    const jsDate = new Date(
        date.year,
        date.month - 1,
        date.day,
        12,
        0,
        0,
    );

    return new Intl.DateTimeFormat(locale, {
        day: 'numeric',
        month: 'short',
        year: 'numeric',
    }).format(jsDate);
}
