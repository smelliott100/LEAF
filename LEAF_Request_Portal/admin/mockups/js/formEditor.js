var vm = new Vue({
    el: ".leaf-app",
    data: {
        state: FormEditorStore.state,
        form: FormEditorStore.state.form
    },
    methods: {
        checkMove: function (evt) {
            return (evt.draggedContext.element.name !== 'toggleable-section');
        }
    }
});
