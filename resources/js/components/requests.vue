<template>
    <div class="inbox-table mt-n5">
        <b-table class="w-100" :items="filteredItems" :fields="columns">
            <template v-for="(column, index) in columns" :slot="column.key" slot-scope="data">
                <span v-if="column.colType === 'editable'">
                    <input v-bind:value="data.value" type="text" />
                </span>
                <span v-else-if="column.colType === 'link'">
                    <a href="#">{{data.value}}</a>
                    <!--links to request could be generated using {{ data.item.id}}-->
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
                requests: [],
                filter: null
            }
        },
        methods: {
            time: function(date) {
                let temp = new Date(date * 1000);
                return temp.getMonth() + '/' + temp.getDate() + '/' + temp.getFullYear()
            },
            filtering: function(request) {
                let keep = true;
                let filter = this.filter;

                for(let i = 0; i < filter.length; i++) {
                    if (typeof(filter[i].field) !== "undefined" || filter[i].field !== null) {
                        switch (filter[i].operator) {
                            case 'equals':
                                keep = (request[filter[i].field].toString() === filter[i].data.toString());
                                break;
                            case 'contains':
                                keep = (request[filter[i].field].toString().indexOf(filter[i].data.toString().trim()) !== -1);
                                break;
                            case 'greaterThan':
                                keep = (Number(request[filter[i].field]) > Number(filter[i].data));
                                break;
                            case 'lessThan':
                                keep = (Number(request[filter[i].field]) < Number(filter[i].data));
                                break;
                            default:
                                break;
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
                            requests: test.data.requests,
                            columns: test.data.columns,
                            selected: []
                        }
                    };
                    this.$store.commit('addSharedData', payload);
                    this.requests = test.data.requests;
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

                if (typeof (this.filter) !== "undefined" && this.filter !== null && this.filter.length > 0) {
                    for(let i = 0; i < this.requests.length; i++) {
                        if (this.filtering(this.requests[i])) {
                            tempArr.push(this.requests[i]);
                        }
                    }
                    return tempArr;
                } else {
                    return this.requests;
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
