import type { NavItem } from '@/types';

import {
    CircleDotDashed,
    LayoutDashboard,
    MapPinned,
    Settings2,
    SlidersHorizontal,
} from '@lucide/vue';

import { t } from '@/lib/utils';

export const AppRoutes: NavItem[] = [
    {
        title: t('Dashboard'),
        href: route('dashboard'),
        icon: LayoutDashboard,
        routeName: 'dashboard',
        adminOnly: false,
    },

    {
        title: t('Settings'),
        icon: Settings2,
        adminOnly: false,

        children: [
            {
                title: t('Provinces'),
                href: route('management.province.list'),
                icon: MapPinned,
                routeName: 'management.province.list',
                activePattern: 'management.province.*',
                adminOnly: false,
            },

            {
                title: t('Property conditions'),
                href: route('management.property-condition.list'),
                icon: SlidersHorizontal,
                routeName: 'management.property-condition.list',
                activePattern: 'management.property-condition.*',
                adminOnly: false,
            },

            {
                title: t('Status'),
                href: route('management.status.list'),
                icon: CircleDotDashed,
                routeName: 'management.status.list',
                activePattern: 'management.status.*',
                adminOnly: false,
            },
        ],
    },
];
