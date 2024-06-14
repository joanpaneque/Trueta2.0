import { defineStore } from 'pinia';

export const useHoverStore = defineStore('hover', {
    state: () => ({
        surgery: null,
        surgeryType: null
    })
});