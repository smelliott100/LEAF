<template>
    <div v-bind:class="advSearchToggle">
        <div v-if="!isOn" class="search-box mt-5">
            <a @click="toggle" href="/#">Advanced Search</a>
            <form>
                <input id="search" name="search" type="text" placeholder="Search...">
                <button class="usa-button leaf-btn search-btn"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div v-if="isOn" id="advSearch">
            <div class="clearfix"><button @click="toggle" class="closeSearch float-right"><i class="fas fa-times"></i></button></div>
            <div v-for="(filter, index) in filters" class="row">
                <div class="w-10"><button v-if="filters.length > 1" @click="removeFilter(index)" class="removeFilter"><i class="fas fa-minus"></i></button></div>
                <div class="w-10"><b-form-select v-model="filter.type" :options="filterTypeOptions"></b-form-select></div>
                <div class="w-25"><b-form-select v-model="filter.field" :options="inboxFieldOptions"></b-form-select></div>
                <div class="w-25"><b-form-select v-model="filter.operator" :options="operatorOptions"></b-form-select></div>
                <div class="w-25"><b-form-input v-model="filter.data"></b-form-input></div>
            </div>
            <div><button @click="newFilter" v-bind:class="operatorAddShift">AND</button></div>
            <div class="search"><button @click="applyFilter">Search</button></div>
        </div>
    </div>
</template>

<script>
    import BContainer from "bootstrap-vue/src/components/layout/container";
    import BFormSelect from "bootstrap-vue/src/components/form-select/form-select";
    import BFormInput from "bootstrap-vue/src/components/form-input/form-input";
    import testApi from '../testAPI'

    export default {
        name: "advancedSearch",
        components: {BFormInput, BFormSelect, BContainer},
        data() {
            return {
                isOn: false,
                filters: [{
                    type: null,
                    field: null,
                    operator: null,
                    data: null
                }],
                inboxFieldOptions: [
                    { value: null, text: '' }
                ],
                requestFieldOptions: [
                    { value: null, text: '' }
                ],
                operatorOptions: [
                    { value: null, text: '' },
                    { value: 'equals', text: '=' },
                    { value: 'contains', text: 'Contains' },
                    { value: 'greaterThan', text: '>' },
                    { value: 'lessThan', text: '<' }
                ],
                filterTypeOptions: [
                    { value: null, text: '' },
                    { value: 'inbox', text: 'Inbox' },
                    { value: 'request', text: 'Requests' }
                ]
            }
        },
        methods: {
            toggle() {
                this.isOn = !this.isOn
            },
            newFilter() {
                this.filters.push({
                    type: null,
                    field: null,
                    operator: null,
                    data: null
                })
            },
            removeFilter(index) {
                this.filters.splice(index, 1);
            },
            applyFilter() {
                this.$store.commit('changeFilter', this.filters);
            },
            populateFieldOptions(columns, type) {
                for(let i = 0; i < columns.length; i++) {
                    if (typeof (columns[i].key) !== "undefined" && columns[i].key !== null && type === 'inbox') {
                        this.inboxFieldOptions.push(columns[i].key);
                    } else if (typeof (columns[i].key) !== "undefined" && columns[i].key !== null && type === 'requests'){
                        this.requestFieldOptions.push(columns[i].key);
                    }
                }
            }
        },
        computed: {
            inboxFields: function () {
                return this.$store.state.sharedData.inbox.columns;
            },
            requestFields: function () {
                return this.$store.state.sharedData.requests.columns;
            },
            advSearchToggle: function () {
                return {
                    'col-8': !this.isOn,
                    'col-sm-12': !this.isOn,
                    'col-md-3': !this.isOn,
                    'col-lg-3': !this.isOn,
                    'offset-lg-3': !this.isOn,
                    'w-50': this.isOn
                }
            },
            operatorAddShift: function () {
                return {
                    'operatorAnd mx-lg-4 p-2 mx-sm-0 mx-md-0': true
                }
            }
        },
        watch: {
            inboxFields (values) {
                this.populateFieldOptions(values, 'inbox')
            },
            requestFields (values) {
                this.populateFieldOptions(values, 'requests')
            }
        }
    }
</script>

<style scoped>
    #advSearch{
        border: solid 1px lightgray;
        background-color: #F5F5F5
    }

    .removeFilter{
        background: none;
        padding: 0.5rem;
        margin-left: 2rem
    }

    .closeSearch{
        background: none;
    }

    .operatorAnd{
        background-color: darkturquoise;
        font-size: 1.5rem;
    }

    .search{
        text-align: center;
    }
</style>
