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
            <div class="clearfix"><button title="Close" @click="toggle" class="closeSearch float-right p-1"><i class="fas fa-times close-button-lg"></i></button></div>
            <div v-for="(filter, index) in filters" class="row">
                <div class="w-10 px-2"><button title="Remove filter" v-if="filters.length > 1" @click="removeFilter(index)" class="removeFilter"><i class="fas fa-minus"></i></button></div>
                <div class="w-25 px-2"><b-form-select title="Please select a request filter" v-model="filter.field" :options="requestFieldOptions"></b-form-select></div>
                <div class="w-25 px-2"><b-form-select title="Please select an operator" v-model="filter.operator" :options="operatorOptions"></b-form-select></div>
                <div class="w-25 px-2"><b-form-input placeholder="Please enter a parameter" title="Please enter a parameter" v-model="filter.data"></b-form-input></div>
            </div>
            <div class="ml-lg-8"><button title="Add new filter" @click="newFilter" class="operatorAnd py-3 px-4 mx-sm-0 mx-md-0">AND</button></div>
            <div class="search search-lg"><button class="p-3" @click="applyFilter">Search</button></div>
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
                    field: null,
                    operator: null,
                    data: null
                }],
                requestFieldOptions: [
                    { value: null, text: 'Select a field' }
                ],
                operatorOptions: [
                    { value: null, text: 'Select an Operator' },
                    { value: 'equals', text: '=' },
                    { value: 'contains', text: 'Contains' },
                    { value: 'greaterThan', text: '>' },
                    { value: 'lessThan', text: '<' }
                ]
            }
        },
        methods: {
            toggle() {
                if (this.isOn) {
                    this.$store.commit('changeFilter', []);
                }
                this.isOn = !this.isOn;
            },
            newFilter() {
                this.filters.push({
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
            populateFieldOptions(columns) {
                for(let i = 0; i < columns.length; i++) {
                    this.requestFieldOptions.push(columns[i].key);
                }
            }
        },
        computed: {
            requestFields: function () {
                return this.$store.state.sharedData.requests.columns;
            },
            advSearchToggle: function () {
                return {
                    'col-5': !this.isOn,
                    'col-sm-12': !this.isOn,
                    'col-md-3': !this.isOn,
                    'col-lg-3': !this.isOn,
                    'offset-lg-5': !this.isOn,
                    'flex-fill ml-4': this.isOn
                }
            }
        },
        watch: {
            requestFields (values) {
                this.populateFieldOptions(values)
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
