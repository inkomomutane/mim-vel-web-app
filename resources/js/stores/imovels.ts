import { Imovels } from './../types/index.d';
import { defineStore } from 'pinia'
import axios from 'axios';

export const useImovelsStore = defineStore('imovels', {
    // a function that returns a fresh state
    state: () => ({
        imovels : null,
    }),
    // optional getters
    getters: {
      // getters receive the state as first parameter
      getImovels: async (state) => {
        let data:Imovels;
        data = await axios.get(route('imovels.vue.api'));
        return data;
      },
    },
    // optional actions
    actions: {
    },
  })
