import fs from 'node:fs/promises';
import path from 'node:path';

import lucideNodes from 'lucide-static/icon-nodes.json' with { type: 'json' };
import lucideTags from 'lucide-static/tags.json' with { type: 'json' };

import * as labIcons from '@lucide/lab';

const outputPath = path.resolve(
    'resources/data/lucide-icons.json',
);

function toKebabCase(value) {
    return value
        .replace(/([a-z0-9])([A-Z])/g, '$1-$2')
        .replace(/([A-Z])([A-Z][a-z])/g, '$1-$2')
        .replace(/_/g, '-')
        .toLowerCase();
}

function toDisplayName(slug) {
    return slug
        .split('-')
        .map(
            word =>
                word.charAt(0).toUpperCase() +
                word.slice(1),
        )
        .join(' ');
}

function isIconNode(value) {
    if (!Array.isArray(value)) {
        return false;
    }

    return value.every(node => {
        return (
            Array.isArray(node) &&
            node.length === 2 &&
            typeof node[0] === 'string' &&
            typeof node[1] === 'object' &&
            node[1] !== null
        );
    });
}

function createSearchText({
                              name,
                              slug,
                              source,
                              tags = [],
                          }) {
    return [
        name,
        slug,
        source,
        ...tags,
    ]
        .join(' ')
        .toLowerCase();
}

/*
|--------------------------------------------------------------------------
| Standard Lucide
|--------------------------------------------------------------------------
*/

const lucide = Object.entries(lucideNodes).map(
    ([slug, iconNode]) => {
        const tags = Array.isArray(lucideTags[slug])
            ? lucideTags[slug]
            : [];

        const icon = {
            name: toDisplayName(slug),
            slug,
            source: 'lucide',
            icon_node: iconNode,
            tags,
        };

        return {
            ...icon,
            search_text: createSearchText(icon),
        };
    },
);

/*
|--------------------------------------------------------------------------
| Lucide Lab
|--------------------------------------------------------------------------
*/

const lab = Object.entries(labIcons)
    .filter(([, value]) => isIconNode(value))
    .map(([exportName, iconNode]) => {
        const slug = toKebabCase(exportName);

        const icon = {
            name: toDisplayName(slug),
            slug,
            source: 'lab',
            icon_node: iconNode,
            tags: [],
        };

        return {
            ...icon,
            search_text: createSearchText(icon),
        };
    });

const icons = [
    ...lucide,
    ...lab,
].sort((a, b) => {
    return a.name.localeCompare(b.name);
});

await fs.mkdir(
    path.dirname(outputPath),
    {
        recursive: true,
    },
);

await fs.writeFile(
    outputPath,
    JSON.stringify(icons, null, 2),
);

console.log(
    `Generated ${icons.length} icons`,
);

console.log(
    `Lucide: ${lucide.length}`,
);

console.log(
    `Lab: ${lab.length}`,
);

console.log(
    `Output: ${outputPath}`,
);
