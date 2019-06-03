<template>
    <div v-if="entries.length !== 0" class="inbox-table mt-n5">
        <div class="inbox-form">
            <div class="row d-flex">
                <div class="flex-fill row mx-5">
                    <form class="usa-form">
                        <select name="inbox-options" id="inbox-options" class="pr-5">
                            <option value>Inbox (14)</option>
                            <option value="value1">Option A</option>
                            <option value="value2">Option B</option>
                            <option value="value3">Option C</option>
                        </select>
                    </form>
                    <a href="#" class="inbox-link ml-5">Open Inbox <i class="fas fa-external-link-alt flex-fill"></i></a>
                </div>
            </div>
        </div>
        <b-table class="w-100" :items="entries" :fields="columns">
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
                entries: [],
            }
        },
        methods: {
            time: function(date) {
                let temp = new Date(date * 1000);
                return temp.getMonth() + '/' + temp.getDate() + '/' + temp.getFullYear()
            }
        },
        created() {
            testApi.getInbox()
                .then(test =>{
                    this.entries = test.data.entries;
                    this.columns = test.data.columns;
                })
                .catch(error => console.log(error))
        }
    }
</script>
