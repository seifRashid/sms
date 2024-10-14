import { defineStore } from 'pinia';

export const useCreateUserStore = defineStore('create-user-store', {
    state: () => ({
        CreateModalBtn: false,
    }),
    getters: {
        doubleCount: (state) => state.count * 2,
    },
    actions: {
        showCreateModalBtn(value) {
            // alert('hello from pinia')
            this.CreateModalBtn = value
        },

    },
});
