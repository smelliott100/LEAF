var section = Vue.component('section-pane', {
    props: {
        'section': {
            type: Object,
            default: function () {
                return {};
            }
        },
        'sectionNumber': {
            type: Number,
            default: 0
        }
    },
    template:
        '<div class="col">' +
            '<div class="card section">' +
                '<h4>{{sectionNumber}}. {{title}} <a href="#" @click="editSection"><i class="fas fa-edit"></i></a></h4>' +
                '<div class="card-icons"><a href="#" @click="removeSection"><i class="fas fa-times"></i></a></div>' +
                '<div class="card-body">{{description}}</div>' +
                '<draggable id="questions-container" class="row dragArea" ' +
                    ':options=\'{group: "questions"}\' :list="questions">' +
                    '<editable-question v-for="(question,index) in questions" :key="question.id" :question="question" :sectionId="id">' +
                    '</editable-question>' +
                    '<toggleable-question :sectionId="id"></toggleable-question>' +
                '</draggable>' +
            '</div>' +
        '</div>',
    data: function () {
        return {
            id: this.section.id,
            title: this.section.title,
            description: this.section.description,
            questions: this.section.questions
        };
    },

    methods: {
        editSection: function () {
            this.$parent.toggleSectionView();
        },
        removeSection: function () {
            FormEditorStore.removeSectionById(this.id);
        }
    }
});