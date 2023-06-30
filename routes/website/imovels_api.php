<?php

use App\Actions\Website\Api\GetImovelsApi;

Route::get('imovels/vue/api', GetImovelsApi::class)->name('imovels.vue.api');

