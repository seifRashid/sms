import { defineStore } from 'pinia';

export const useCreateUserStore = defineStore('create-user-store', {
    state: () => ({
        CreateModalBtnTeacher: false,
        CreateModalBtnStudent: false,
        CreateModalBtnGuardian: false,
        CreateModalBtnDarasa: false,
    }),
    getters: {
        doubleCount: (state) => state.count * 2,
    },
    actions: {
        showCreateModalBtnTeacher(value) {
            // alert('hello from pinia')
            this.CreateModalBtnTeacher = value
        },
        showCreateModalBtnStudent(value) {
            // alert('hello from pinia')
            this.CreateModalBtnStudent = value
        },
        showCreateModalBtnGuardian(value) {
            // alert('hello from pinia')
            this.CreateModalBtnGuardian = value
        },
        showCreateModalBtnClass(value) {
            // alert('hello from pinia')
            this.CreateModalBtnDarasa = value
        },

    },
});
