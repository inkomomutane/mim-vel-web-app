<script setup lang="ts">
import { toast } from 'vue-sonner'
import { BasicPage } from '@/components/global-layout'
import { Button } from '@/components/ui/button'


const tabs = [
  { name: 'Overview', value: 'overview' },
  { name: 'Analytics', value: 'analytics', disabled: true },
  { name: 'Reports', value: 'reports', disabled: true },
  { name: 'Notifications', value: 'notifications', disabled: true },
]

const defaultTab = tabs[0].value
</script>

<template>
  <BasicPage
    title="workspace"
    description="workspace description"
    sticky
  >
    <template #actions>
      <Button
        @click="() => toast('hello', {
          position: 'top-center',
        })"
      >
        {{ $t('download') }}
      </Button>
    </template>


  </BasicPage>
</template>
