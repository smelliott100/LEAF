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
            fieldKeys: function() {
                let keys = [];
                for(let i = 0; i < this.columns.length; i++) {
                    if (typeof (this.columns[i].key) !== "undefined" && this.columns[i].key !== null) {
                        keys.push(this.columns[i].key);
                    }
                }
                return keys;
            },
            filtering: function(request) {
                let keep = true;
                let tempObj = request;

                for(let i = 0; i < this.filter.length; i++) {
                    keep = (typeof(this.filter[i].field) === "undefined" || this.filter[i].field === null|| request.key === this.filter[i].field);
                }
                return keep;
            }
        },
        created() {
            testApi.getInbox()
                .then(test =>{
                    let payload = {
                        inbox: {
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
                return this.$store.state.sharedData.inbox.selected;
            },
            filteredItems: function(){
                let tempArr = [];
                for(let i = 0; i < this.requests.length; i++) {
                    if (this.filtering(this.requests[i])) {
                        tempArr.push(this.requests[i]);
                    }
                }
                return tempArr;
            }
        },
        mounted() {
        },
        watch: {
            filters (data) {
                this.filter = data;
            }
        }
    }
</script>
