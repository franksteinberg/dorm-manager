<template>
    <div class="p-4 pb-16 mx-auto">
        <div v-if="msg" class="dim text-3xl text-teal-light font-bold">
            <span class="msg">{{ msg }}</span>
        </div>

        <div v-if="loading">
            <div class="loader">Loading...</div>
        </div>

        <div v-else>
            <div class="text-5xl leading-loose tracking-tight text-teal-darker m-3 uppercase">
                Residents
            </div>

            <a class="outline-none shadow-none" href="/residents/create">
                <button class="rounded-full p-3 m-4 bg-teal-darker text-white text-xl cursor:pointer hover:bg-teal-dark">
                    <i class="fas fa-plus"></i> Add Resident
                </button>
            </a>
            <v-card>
                <v-card-title>
                    <v-spacer></v-spacer>
                </v-card-title>
                <v-data-table
                        :headers="headers"
                        :items="residents"
                        :pagination.sync="pagination"
                >
                    <template slot="items" slot-scope="props">
                        <tr @click="editResident(props.item.id)">
                            <td class="text-4xl">{{ props.item.first_name }}</td>
                            <td class="text-4xl">{{ props.item.last_name }}</td>
                            <td class="text-4xl">{{ props.item.gender }}</td>
                            <td class="text-4xl">{{ props.item.bed.room.unit.building.name }}</td>
                            <td class="text-4xl">{{ props.item.bed.room.unit.id }}</td>
                            <td class="text-4xl">{{ props.item.bed.room.number }}</td>
                            <td class="text-4xl"><a><i class="fas fa-edit"></i></a></td>
                        </tr>
                    </template>
                    <v-alert slot="no-results" :value="true" color="error" icon="warning">
                        Your search for "{{ search }}" found no results.
                    </v-alert>
                </v-data-table>
            </v-card>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                search: '',
                loading: false,
                msg: '',
                headers: [
                    {
                        text: 'First Name',
                        align: 'left',
                        sortable: true,
                        value: 'first_name'
                    },
                    {
                        text: 'Last Name',
                        align: 'left',
                        sortable: true,
                        value: 'last_name'
                    },
                    {
                        text: 'Gender',
                        align: 'left',
                        sortable: true,
                        value: 'gender'
                    },
                    {
                        text: 'Building',
                        align: 'left',
                        sortable: true,
                        value: 'building'
                    },
                    {
                        text: 'Unit',
                        align: 'left',
                        sortable: true,
                        value: 'unit'
                    },
                    {
                        text: 'Room',
                        align: 'left',
                        sortable: true,
                        value: 'room'
                    },
                    {
                        text: '',
                        align: 'left',
                        sortable: false,
                        value: ''
                    }
                ],
                pagination: {
                    rowsPerPage: -1
                }
            }
        },

        props: {
            'residents': {
                'type': Array
            },
        },

        methods: {
            editResident(id) {
                window.location.href = '/residents/' + id
            }
        }
    }
</script>

<style>
    .dim
    {
        height:100%;
        width:100%;
        position:fixed;
        left:0;
        top:0;
        z-index:100 !important;
        background-color:black;
        filter: alpha(opacity=75); /* internet explorer */
        -moz-opacity: 0.75;       /* mozilla, netscape */
        opacity: 0.75;           /* fx, safari, opera */
    }

    .dim .msg {
        display:inline-block;
        position: absolute;
        width: 200px;
        height: 100px;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
    }
</style>
