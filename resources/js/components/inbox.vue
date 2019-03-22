<template>
    <div class="inbox-table mt-n5">
        <b-table class="w-100" :items="requests" :fields="columns">
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
                <span v-else-if="column.colType === ''">
                    {{data.value}}
                </span>
                <span v-else >
                    {{data.value}}
                </span>
            </template>
        </b-table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                columns: [{
                    key: 'date',
                    sortable: true,
                    variant: '',
                    colType: 'date'
                },
                {
                    key: 'site',
                    sortable: true,
                    variant: '',
                    colType: ''
                },
                {
                    key: 'request',
                    sortable: true,
                    // Variant applies to the whole column, including the header and footer
                    variant: 'red',
                    colType: ''
                },{
                    key: 'status',
                    sortable: true,
                    variant: 'green',
                    colType: ''
                    },
                {
                    key: 'action',
                    sortable: true,
                    variant: '',
                    colType: ''
                }],
                requests: [
                    {
                        date: 1552497837,
                        site: "Site 1",
                        request: 1,
                        status: "Pending",
                        action: "Approve",
                        editable: true,
                        _rowVariant: 'yellow',
                        _cellVariants: {
                            status: "red"
                        }
                    },
                    {
                        date: 1552497837,
                        site: "Site 1",
                        request: 3,
                        status: "Not Submitted",
                        action: "Approve",
                        _rowVariant: '',
                        _cellVariants: {}
                    },
                    {
                        date: 1552497837,
                        site: "Site 1",
                        request: 4,
                        status: "Pending",
                        action: "Approve",
                        _rowVariant: '',
                        _cellVariants: {}
                    },
                    {
                        date: 1552497837,
                        site: "Site 1",
                        request: 4,
                        status: "Pending",
                        action: "Approve",
                        _rowVariant: '',
                        _cellVariants: {}
                    },
                    {
                        date: 1552497837,
                        site: "Site 1",
                        request: 4,
                        status: "Pending",
                        action: "Approve",
                        _rowVariant: '',
                        _cellVariants: {}
                    },
                    {
                        date: 1552497837,
                        site: "Site 1",
                        request: 4,
                        status: "Pending",
                        action: "Approve",
                        _rowVariant: '',
                        _cellVariants: {}
                    },
                    {
                        date: 1552497837,
                        site: "Site 1",
                        request: 4,
                        status: "Pending",
                        action: "Approve",
                        _rowVariant: '',
                        _cellVariants: {}
                    },
                    {
                        date: 1552497837,
                        site: "Site 1",
                        request: 4,
                        status: "Pending",
                        action: "Approve",
                        _rowVariant: '',
                        _cellVariants: {}
                    },
                    {
                        date: 1552497837,
                        site: "Site 1",
                        request: 4,
                        status: "Pending",
                        action: "Approve",
                        _rowVariant: '',
                        _cellVariants: {}
                    },
                    {
                        date: 1552497837,
                        site: "Site 1",
                        request: 4,
                        status: "Pending",
                        action: "Approve",
                        _rowVariant: '',
                        _cellVariants: {}
                    },
                    {
                        date: 1552497837,
                        site: "Site 1",
                        request: 4,
                        status: "Pending",
                        action: "Approve",
                        _rowVariant: '',
                        _cellVariants: {}
                    },
                    {
                        date: 1552497837,
                        site: "Site 1",
                        request: 4,
                        status: "Pending",
                        action: "Approve",
                        _rowVariant: '',
                        _cellVariants: {}
                    },
                    {
                        date: 1552497837,
                        site: "Site 1",
                        request: 4,
                        status: "Pending",
                        action: "Approve",
                        _rowVariant: '',
                        _cellVariants: {}
                    },
                    {
                        date: 1552497837,
                        site: "Site 2",
                        request: 2,
                        status: "Pending",
                        action: "Approve",
                        _rowVariant: '',
                        _cellVariants: {}
                    }]
            }
        },
        methods: {
            time: function(date) {
                let temp = new Date(date * 1000);
                return temp.getMonth() + '/' + temp.getDate() + '/' + temp.getFullYear()
            },
            showAlert: function(event){
                alert('How can I help you!');
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>
    .table-red{
        color: white;
        background-color: red
    }

    .table-yellow{
        color: black;
        background-color: yellow
    }

    .table-green{
        color: white;
        background-color: green
    }

    .table-orange{
        color: black;
        background-color: orange
    }

    .table-blue{
        color: white;
        background-color: blue
    }

    .table-indigo{
        color: white;
        background-color: indigo
    }

    .table-purple{
        color: white;
        background-color: purple
    }

    .table-pink{
        color: black;
        background-color: pink
    }

    .table-teal{
        color: white;
        background-color: teal
    }

    .table-cyan{
        color: black;
        background-color: cyan
    }

</style>
