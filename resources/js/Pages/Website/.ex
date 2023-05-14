

        <PageHero>
            <template v-slot:coverImage>

                <ResponsiveImage  class=" object-cover h-fit mx-auto"  v-if="$page.props.globals != null" :responsive="$page.props.globals.homeMedia ?? undefined" />

            </template>
            <template v-slot:content>
                <div
                    class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:pt-16 lg:px-12"
                >
                    <h1
                        class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-white md:text-3xl dark:text-white"
                    >
                        <img
                            src="@/images/logo/logo.png"
                            class="mx-auto mt-24 sm:m-auto w-72"
                            alt="Logo"
                        />
                    </h1>
                    <p
                        class="mb-8 text-xs font-normal text-white lg:text-sm sm:px-16 xl:px-48 dark:text-gray-400"
                    >
                       <div class="bg-slate-50 p-8 ">
                            <Dropdown v-model="selectedCity"
                            :options="cities" optionLabel="name"
                             placeholder="Select a City" class=" mr-4 border border-slate-600 p-2 px-6 text-slate-400 bg-white"
                             />
                             <Dropdown v-model="selectedCity"
                            :options="cities" optionLabel="name"
                             placeholder="Select a City" class="  border border-slate-600 p-2 px-6 text-slate-400 bg-white"
                             />

                        </div>
                    </p>
                </div>
            </template>
        </PageHero>
