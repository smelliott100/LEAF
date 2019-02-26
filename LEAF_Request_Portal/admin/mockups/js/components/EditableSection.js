var editableSection = Vue.component('editable-section', {
    props: {
        'section': {
            type: Object,
            default: function () {
                return {};
            }
        }
    },
    template:
        '<div class="row">' +
            '<section-form v-if="editFormOpen" :section="section"></section-form>' +
            '<section-pane v-else :section="section" :sectionNumber="getSectionIndex"></section-pane>' +
        '</div>',
    data: function () {
        return {
            editFormOpen: this.editFormOpen || false
        };
    },
    computed: {
        getSectionIndex: function () {
            var id = this.section.id;
            var idx = FormEditorStore.state.sections.findIndex(function (section) {
                return section.id === id;
            });

            return 1 + idx; // add one to base 0 index
        }
    },
    methods: {
        updateSection: function (title, description) {
            this.section.title = title;
            this.section.description = description;
            this.toggleSectionView();
        },
        toggleSectionView: function () {
            this.editFormOpen = !this.editFormOpen;
        }
    }
});