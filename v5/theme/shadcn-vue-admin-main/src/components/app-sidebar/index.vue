<script setup lang="ts">
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarRail } from '@/components/ui/sidebar'

import { sidebarData } from './data/sidebar-data'
import NavFooter from './nav-footer.vue'
import TeamSwitcher from './team-switcher.vue'
import NavTeamCollapsible from "../../../../../resources/js/components/app-sidebar/nav-team-collapsible.vue";
</script>

<template>
  <Sidebar collapsible="icon" class="z-50">
    <SidebarHeader class="border-b h-14 py-1 group-data-[collapsible=icon]:justify-center">
      <TeamSwitcher :teams="sidebarData.teams" />
    </SidebarHeader>

    <SidebarContent>
        <NavTeamCollapsible :nav-main="sidebarData.navMain" />
    </SidebarContent>

    <SidebarFooter class="border-t h-14 py-1 group-data-[collapsible=icon]:justify-center">
      <NavFooter :user="sidebarData.user" />
    </SidebarFooter>
    <SidebarRail />
  </Sidebar>
</template>
