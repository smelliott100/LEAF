<template>
    <div class="inbox-table mt-n5">
        <b-table class="w-100" :items="filteredItems" :fields="columns">
            <template v-for="(column, index) in columns" :slot="column.key" slot-scope="data">
                <span v-if="column.colType === 'editable'">
                    <input v-bind:value="data.value" type="text" />
                </span>
                <span v-else-if="column.colType === 'link'">
                    <a href="#">{{data.value}}</a>
                    <!--links to request could be generated using {{ data.column.id}}-->
                </span>
                <span v-else-if="column.colType === 'date'">
                    {{time(data.value)}}
                </span>
                <span v-else-if="column.colType === 'action'">
                    <i class="fas fa-check-square"></i><a href="#">{{data.value}}</a>
                </span>
                <span v-else-if="column.colType === ''">
                    {{data.value}}
                </span>
                <!--html will need XSS sanitizing-->
                <div v-else-if="column.colType === 'html'" v-html="data.value"></div>
            </template>
        </b-table>
    </div>
</template>

<script>
    import testApi from '../testAPI'
    export default {
        data() {
            return {
                columns: [],
                entries: [],
                filter: null
            }
        },
        methods: {
            time: function(date) {
                let temp = new Date(date * 1000);
                return temp.getMonth() + '/' + temp.getDate() + '/' + temp.getFullYear()
            },
            filtering: function(entry) {
                let keep = true;
                let filter = this.filter;

                //filtering entries field by field based on user criteria of filter[i].data
                for(let i = 0; i < filter.length; i++) {
                    if (typeof(filter[i].field) !== "undefined" || filter[i].field !== null) {
                        switch (filter[i].operator) {
                            case 'equals':
                                keep = (entry[filter[i].field].toString() === filter[i].data.toString());
                                break;
                            case 'notEquals':
                                keep = (entry[filter[i].field].toString() !== filter[i].data.toString());
                                break;
                            case 'contains':
                                keep = (entry[filter[i].field].toString().indexOf(filter[i].data.toString().trim()) !== -1);
                                break;
                            case 'notContains':
                                keep = (entry[filter[i].field].toString().indexOf(filter[i].data.toString().trim()) === -1);
                                break;
                            case 'greaterThanEq':
                                keep = (Number(entry[filter[i].field]) >= Number(filter[i].data));
                                break;
                            case 'lessThanEq':
                                keep = (Number(entry[filter[i].field]) <= Number(filter[i].data));
                                break;
                            default:
                                break;
                        }

                        //if false for any filter, it is not included in the tempArr
                        if (!keep) {
                            return keep;
                        }
                    }
                }
                return keep;
            }
        },
        created() {
            testApi.getRequests()
                .then(test =>{
                    let payload = {
                        requests: {
                            entries: test.data.entries,
                            columns: test.data.columns,
                            selected: []
                        }
                    };
                    this.$store.commit('addSharedData', payload);
                    this.entries = test.data.entries;
                    this.columns = test.data.columns;
                })
                .catch(error => console.log(error))
        },
        computed: {
            filters: function () {
                return this.$store.state.sharedData.requests.selected;
            },
            filteredItems: function(){
                let tempArr = [];

                //filters entries one by one and pushes to temporary array if criteria is met
                if (typeof (this.filter) !== "undefined" && this.filter !== null && this.filter.length > 0) {
                    for(let i = 0; i < this.entries.length; i++) {
                        if (this.filtering(this.entries[i])) {
                            tempArr.push(this.entries[i]);
                        }
                    }
                    return tempArr;
                } else {
                    return this.entries;
                }
            }
        },
        watch: {
            filters (data) {
                this.filter = data;
            }
        }
    }
</script>
