<template>
    <div v-bind:class="advSearchToggle" style="margin-bottom: -25px;">
        <div class="flex-fill col-lg-2">
            <button class="usa-button leaf-btn leaf-btn-green"><i class="fas fa-plus"></i> Create Request</button>
        </div>
        <div class="flex-fill mr-5 col-lg-7">
            <button class="usa-button leaf-btn ml-n5"><i class="fas fa-file"></i> Report Builder</button>
        </div>
        <div v-if="!isOn" class="search-box">
            <span title="Toggle advanced search" tabindex="0" role="button" @click="toggle" class="fakeButton">Advanced Search</span>
            <form class="row d-flex flex-nowrap">
                <input id="search" name="search" type="text" placeholder="Search..." class="flex-fill">
                <button class="usa-button leaf-btn search-btn flex-shrink-1 rounded-left"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div v-if="isOn" id="advSearch" class="w-100 mx-4">
            <div class="clearfix"><button title="Close" @click="toggle" class="closeSearch float-right p-1"><i class="fas fa-times close-button-lg"></i></button></div>
            <div v-for="(filter, index) in filters" class="row d-flex mx-2">
                <div class="flex-shrink px-2"><button title="Remove filter" v-if="filters.length > 1" @click="removeFilter(index)" class="removeFilter"><i class="fas fa-minus"></i></button></div>
                <div class="flex-fill px-2"><b-form-select title="Please select a request filter" v-model="filter.field" :options="requestFieldOptions"></b-form-select></div>
                <div class="flex-fill px-2"><b-form-select title="Please select an operator" v-model="filter.operator" :options="operatorOption(filter)"></b-form-select></div>
                <div class="flex-fill px-2"><b-form-input placeholder="Please enter a parameter" title="Please enter a parameter" v-model="filter.data"></b-form-input></div>
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
                operatorNames: [
                    { value: null, text: 'Select an operator' },
                    { value: 'equals', text: '=' },
                    { value: 'notEquals', text: '!=' },
                    { value: 'contains', text: 'Contains' },
                    { value: 'notContains', text: 'Does not contain' }
                ],
                operatorNumbers: [
                    { value: null, text: 'Select an operator' },
                    { value: 'equals', text: '=' },
                    { value: 'greaterThanEq', text: '>=' },
                    { value: 'lessThanEq', text: '<=' }
                ],
                operatorOrgchart: [
                    { value: 'equals', text: 'Is' }
                ],
                operatorWorkflow: [
                    { value: 'equals', text: '=' }
                ],
                operatorBoolean: [
                    { value: null, text: 'Select an operator' },
                    { value: 'equals', text: 'Is' },
                    { value: 'notEquals', text: 'Is not' }
                ],
                operatorDates: [
                    { value: null, text: 'Select an operator' },
                    { value: 'equals', text: 'On' },
                    { value: 'greaterThanEq', text: 'On or after' },
                    { value: 'lessThanEq', text: 'On or before' }
                ],
                operatorGeneric: [
                    { value: null, text: 'Select an operator' },
                    { value: 'equals', text: '=' },
                    { value: 'notEquals', text: '!=' },
                    { value: 'contains', text: 'Contains' },
                    { value: 'notContains', text: 'Does not contain' }
                ],
                operatorGenericNull: [
                    { value: null, text: 'Select a field first' },
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
            },
            operatorOption(input) {
                let filter = input;
                let options = [];
                if (typeof(filter) === "undefined" || filter === null || typeof(filter.field) === "undefined") {
                    return this.operatorGenericNull;
                }
                //will need further filtering based on indicator data.  Right now, using generic operator
                //options that allow use of all operators if no type is found for it
                switch (filter.field) {
                    case 'title':
                        options = this.operatorNames;
                        break;
                    case 'initiator':
                        options = this.operatorOrgchart;
                        break;
                    case 'id':
                        options = this.operatorNumbers;
                        break;
                    case 'date':
                        options = this.operatorDates;
                        break;
                    case 'service':
                    case 'status':
                    case 'form':
                        options = this.operatorBoolean;
                        break;
                    case 'requirement':
                        options = this.operatorWorkflow;
                        break;
                    case null:
                        options = this.operatorGenericNull;
                        break;
                    default:
                        options = this.operatorGeneric;
                }
                return options;
            }
        },
        computed: {
            requestFields: function () {
                return this.$store.state.sharedData.requests.columns;
            },
            advSearchToggle: function () {
                return {
                    'flex-fill': this.isOn,
                    'row': true
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
