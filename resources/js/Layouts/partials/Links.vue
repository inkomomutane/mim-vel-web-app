<script setup lang="ts">
import ProfileLink from "./Links/ProfileLink.vue";
import ImovelsLink from "./Links/ImovelsLink.vue";
import NotAprrovedImovelsLink from "./Links/NotAprrovedImovelsLink.vue";
import ImovelsTrashLink from "./Links/ImovelsTrashLink.vue";
import PaginasLink from "./Links/PaginasLink.vue";
import BannersLink from "./Links/BannersLink.vue";
import UsersLink from "./Links/UsersLink.vue";
import TransationTypesLink from "./Links/TransationTypesLink.vue";
import IntermediationRulesLink from "./Links/IntermediationRulesLink.vue";
import NegociationRulesLink from "./Links/NegociationRulesLink.vue";
import ImovelConditionsLink from "./Links/ImovelConditionsLink.vue";
import ImovelTypesLink from "./Links/ImovelTypesLink.vue";
import ImovelStatusLink from "./Links/ImovelStatusLink.vue";
import ProvincesLink from "./Links/PovincesLink.vue";
import CitiesLink from "./Links/CitiesLink.vue";
import NeighborhoodsLink from "./Links/NeighborhoodsLink.vue";
import LegalPoliciesLink from "./Links/LegalPoliciesLink.vue";
import LegaltermsLink from "./Links/LegaltermsLink.vue";
import MessagesLink from "./Links/MessagesLink.vue";
import AttributesLink from "./Links/AttributesLink.vue";
</script>
<template>
    <div class="space-y-8">
        <!-- Pages group -->
        <div>
            <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">
                <span
                    class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                    aria-hidden="true"
                    >•••</span
                >
                <span class="lg:hidden lg:sidebar-expanded:block 2xl:block"
                    >Pages</span
                >
            </h3>
            <ul class="mt-3">
                <ProfileLink />
                <ImovelsLink />
                <NotAprrovedImovelsLink />
                <ImovelsTrashLink />
                <AttributesLink />
                <MessagesLink />
                <PaginasLink />
                <BannersLink />
                <UsersLink />
                <TransationTypesLink />
                <IntermediationRulesLink />
                <NegociationRulesLink />
                <ImovelConditionsLink />
                <ImovelTypesLink />
                <ImovelStatusLink />
                <ProvincesLink />
                <CitiesLink />
                <NeighborhoodsLink />
            </ul>
            <h3
                class="text-xs uppercase text-slate-500 font-semibold pl-3 mt-2"
            >
                <span
                    class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                    aria-hidden="true"
                    >•••</span
                >
                <span class="lg:hidden lg:sidebar-expanded:block 2xl:block"
                    >Legalidade</span
                >
            </h3>
            <ul class="mt-3">
                <LegalPoliciesLink />
                <LegaltermsLink />
            </ul>
        </div>
    </div>
</template>
