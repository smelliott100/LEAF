var toggleableQuestion = Vue.component('toggleable-question', {
    props: {
        'sectionId': {
            type: Number,
            default: 0
        }
    },
    template:
        '<div class="col-4">' +
            '<question-form v-if="isOpen" :create="true" :sectionId="sectionId"></question-form>' +
            '<div v-else class="card question new-question" @click="toggleQuestionView">' +
                '<h3>+ Add Question</h3>' +
            '</div>' +
        '</div>'
    ,
    data: function () {
        return {
            isOpen: this.isOpen || false
        };
    },

    methods: {
        toggleQuestionView: function () {
            this.isOpen = !this.isOpen;
        }
    }
});