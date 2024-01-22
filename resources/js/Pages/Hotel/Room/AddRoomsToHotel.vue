<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {PropType, ref, watch} from "vue";
import ResponsiveImage from "@/Components/ResponsiveImage.vue";
import AddRoomModal from "@/Pages/Hotel/Room/AddRoomModal.vue";
import Flasher from "@/helprs";
import {FlasherResponse} from "@flasher/flasher";
import DeleteRoom from "@/Pages/Hotel/Room/DeleteRoom.vue";
import EditRoomModal from "@/Pages/Hotel/Room/EditRoomModal.vue";
const props = defineProps({
    hotel :  Object as PropType<App.Data.HotelMetaDataDtoData>,
    messages: Object as PropType<FlasherResponse>,
});

watch(
    () => props.messages,
    (value) => {
        value?.envelopes.forEach((element) => {
            Flasher.flash(
                element.notification.type,
                element.notification.message
            );
        });
    },{
        immediate :true
    }
);

const deletingRoomTrigger = ref(false);
const deletingRoom = ref<App.Data.HotelData | null>(null);
function openDeleteRoomModal(status: App.Data.HotelData) {
    deletingRoom.value = status;
    deletingRoomTrigger.value = true;
}

function closeDeleteRoomModal() {
    deletingRoom.value = null;
    deletingRoomTrigger.value = false;
}

const editRoomTrigger = ref(false);
const editRoom = ref<App.Data.HotelData|null>(null);
const editRoomOpenModel = (room : App.Data.HotelData) => {
    editRoom.value = room;
    editRoomTrigger.value = true;
};
const closeEditRoomModal = () => {
    editRoom.value = null;
    editRoomTrigger.value = false;
};

</script>

<template>
<AuthenticatedLayout>
 <template v-slot:content>
     <div
         class="flex flex-col md:flex-row items-end justify-end space-b-3 md:space-y-0 md:space-x-4 p-4"
     >
       <AddRoomModal :hotel="hotel?.slug ?? ''"/>
     </div>
     <div
         class="p-8 rounded overflow-auto  dark:text-slate-50"
     >
         <ul class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-8">
             <li v-for="room in hotel?.hotels">
                 <article
                     class="!w-full bg-white dark:bg-gray-700  dark:border-gray-700 transition-transform duration-300 transform-gpu hover:scale-95 hover:shadow-none hover:shadow-gray-400 hover:rounded">
                     <header class="bg-gray-500 rounded-md">
                         <ResponsiveImage v-if="room.media" :responsive="room.media" class-name="col-span-1 sm:col-span-3  h-64  w-full object-cover rounded-md" />
                     </header>
                     <div class="w-full p-4 pb-6 font-['Jost'] text-gray-500  grid justify-items-stretch col-span-3">
                         <div class="flex justify-between">
                             <h1 class="text-lg  font-semibold line-clamp-1 normal-case py-1 first-letter:uppercase">
                                 {{room.title }}
                             </h1>
                         </div>

                         <div class="flex mb-1 font-normal text-sm text-gray-700 dark:text-gray-400 line-clamp-1"
                              itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                             <svg class="text-gray-400" width="20" height="20"
                                  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                  stroke="currentColor">
                                 <circle cx="12" cy="10" r="3" stroke="currentColor"
                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></circle>
                                 <path
                                     d="M12 2C7.58172 2 4 5.58172 4 10C4 11.8919 4.40209 13.1304 5.5 14.5L12 22L18.5 14.5C19.5979 13.1304 20 11.8919 20 10C20 5.58172 16.4183 2 12 2Z"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"></path>
                             </svg>
                             <p class="line-clamp-1 dark:text-white">
                                 &nbsp;
                                 {{ room.price }}
                             </p>

                         </div>
                         <div class="grid grid-cols-2 gap-8 mt-2">
                             <button
                                 @click="editRoomOpenModel(room)"
                                 class="w-fit flex items-center justify-center text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-900 focus:outline-none dark:focus:ring-slate-800"
                             >
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path class="fill-current text-gray-100" opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="black"></path><path class="fill-current text-gray-100" d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="black"></path><path class="fill-current text-gray-100" d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="black"></path></svg>
                                    <span class="px-2">Editar</span>
                             </button>
                             <button
                                 @click="openDeleteRoomModal(room)"
                                 class="w-fit flex items-center justify-center text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-slate-300 font-medium rounded text-sm px-4 py-2 dark:bg-slate-600 dark:hover:bg-slate-900 focus:outline-none dark:focus:ring-slate-800"
                             >
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path class="fill-current text-gray-100" d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"></path><path class="fill-current text-gray-100" opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"></path><path class="fill-current text-gray-100" opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"></path></svg>
                                <span>Exculir</span>
                             </button>
                         </div>
                     </div>

                 </article>
             </li>
         </ul>
     </div>
     <DeleteRoom v-if="deletingRoom" :open-modal="deletingRoomTrigger" :close="closeDeleteRoomModal" :room="deletingRoom" />
     <EditRoomModal v-if="editRoom" :open-modal="editRoomTrigger" :close="closeEditRoomModal" :hotel="editRoom" />
 </template>
</AuthenticatedLayout>
</template>

