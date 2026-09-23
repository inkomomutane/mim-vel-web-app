import type { NavItem } from '@/types';
import { GraduationCap, LayoutGrid, Users,ListCheck,ListChecks, FileText, DollarSign, CheckSquare } from '@lucide/vue';
import {t} from "@/lib/utils"



export const AppRoutes: NavItem[]  = [
    {
        title: t('Dashboard'),
        href: route('dashboard'),
        icon: LayoutGrid,
        routeName: 'dashboard',
        adminOnly: false,
    },
    {
        title: t('Provinces'),
        href: route('management.province.list'),
        icon: ListCheck,
        routeName: 'management.province.list',
        adminOnly: false,
    }, {
        title: t('Property conditions'),
        href: route('management.property-condition.list'),
        icon: ListChecks,
        routeName: 'management.property-condition.list',
        adminOnly: false,
    },{
      title: t('Status')
        , href: route('management.status.list'),
        icon: CheckSquare,
        routeName: 'management.status.list',
        adminOnly: false,
    }
];
