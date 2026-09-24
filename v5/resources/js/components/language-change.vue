<script setup lang="ts">
import type { AcceptableValue } from 'reka-ui'

import { Icon } from '@iconify/vue'


import { Button } from '@/components/ui/button'
import { DropdownMenu, DropdownMenuContent, DropdownMenuRadioGroup, DropdownMenuRadioItem, DropdownMenuTrigger } from '@/components/ui/dropdown-menu'





function handleLocaleChange(val: AcceptableValue) {

}
</script>

<template>
  <DropdownMenu>
    <DropdownMenuTrigger as-child>
      <Button
        variant="outline"
        size="icon-sm"
        aria-label="Change language"
        title="Change language"
      >
        <Icon icon="mdi:translate" />
        <span class="sr-only">Change language</span>
      </Button>
    </DropdownMenuTrigger>
    <DropdownMenuContent align="end">
      <DropdownMenuRadioGroup
        v-model="locale"
        @update:model-value="handleLocaleChange"
      >
        <DropdownMenuRadioItem value="en">
          <span>English</span>
        </DropdownMenuRadioItem>
      </DropdownMenuRadioGroup>
    </DropdownMenuContent>
  </DropdownMenu>
</template>
