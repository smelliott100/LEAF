var toggleableSection = Vue.component('toggleable-section', {
    template:
        '<div class="row">' +
            '<section-form v-if="isOpen" :create="true"></section-form>' +
            '<div v-else class="col-4">' +
                '<div class="card section new-section" @click="toggleSectionView">' +
                    '<h3>+ Add Section</h3>' +
                '</div>' +
            '</div>' +
        '</div>'
    ,
    data: function () {
        return {
            isOpen: this.isOpen || false
        };
    },
    methods: {
        toggleSectionView: function () {
            this.isOpen = !this.isOpen;
        }
    }
});