var editableQuestion = Vue.component('editable-question', {
    props: {
        'question': {
            type: Object,
            default: function () {
                return {};
            }
        },
        'sectionId': {
            type: Number,
            default: 0
        }
    },
    template:
        // '<div :class="className">' +
        '<div class="col-4">' +
            '<question-form v-if="editFormOpen":question="question" @update-question="updateQuestion"></question-form>' +
            '<question-pane v-else :question="question" :sectionId="sectionId" @remove-question="removeQuestion" :questionNumber="getQuestionIndex"></question-pane>' +
        '</div>',
    data: function () {
        return {
            editFormOpen: this.editFormOpen || false
        };
    },
    computed: {
        getQuestionIndex: function () {
            var id = this.question.id;
            var section = FormEditorStore.getSectionById(this.sectionId);
            var idx = section.questions.findIndex(function (question) {
                return question.id === id;
            });

            return 1 + idx; // add one to base 0 index
        }
    },
    methods: {
        updateQuestion: function (text, type, multiInputOptions, answer, required, sensitive) {
            this.question.text = text;
            this.question.type = type;
            this.question.multiInputOptions = multiInputOptions;
            this.question.answer = answer;
            this.question.required = required;
            this.question.sensitive = sensitive;
            this.toggleQuestionView();
        },
        toggleQuestionView: function () {
            this.editFormOpen = !this.editFormOpen;
        },
        removeQuestion: function(id) {
            var section = FormEditorStore.getSectionById(this.sectionId);
            var idx = FormEditorStore.getQuestionIndex(section, id);
            section.questions.splice(idx, 1);
        }
    }
});