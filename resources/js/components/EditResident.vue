<template>
    <div class="container p-4 mx-auto">
        <div v-if="msg" class="dim text-3xl text-teal-light font-bold">
            <span class="msg">{{ msg }}</span>
        </div>

        <div v-if="loading">
            <div class="loader">Loading...</div>
        </div>

        <div v-else>
            <div class="text-5xl leading-loose tracking-tight text-teal-darker m-3 uppercase">
                Edit Resident
            </div>
            <form name="create-resident" @submit.prevent="submitForm" class="px-4 pt-4 pb-16  bg-white w-100 border border-grey-light shadow shadow-lg rounded">
                <div class="block uppercase tracking-wide text-teal-dark text-xl font-bold mb-2">Basic Info</div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="first_name">
                            First Name
                        </label>
                        <input name="first_name" required aria-required="true" v-model="resident.first_name" type="text" maxlength="50" placeholder="Jane" class="appearance-none block w-full bg-grey-lighter text-grey-darkest border border-grey-light rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-teal">
                        <p class="hidden text-red text-xs italic"></p>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2" for="last_name">
                            Last Name
                        </label>
                        <input name="last_name" required aria-required="true" v-model="resident.last_name" type="text" maxlength="50" placeholder="Doe" class="appearance-none block w-full bg-grey-lighter text-grey-darkest border border-grey-light rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-teal">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2" for="gender">
                            Gender
                        </label>
                        <div class="relative">
                            <span v-if="resident.gender == 'F'" class="text-xl text-grey-darkest">Female</span>
                            <span v-else class="text-xl text-grey-darkest">Male</span>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2" for="birth_date">
                            Date of Birth
                        </label>
                        <input name="birth_date" maxlength="50" v-model="resident.birth_date" type="date" placeholder="12/22/1997" class="appearance-none block w-full bg-grey-lighter text-grey-darkest border border-grey-light rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-teal">
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2" for="student_id">
                            Student ID
                        </label>
                        <input name="student_id" maxlength="50" v-model="resident.student_id" type="text" placeholder="JD-8513789" class="appearance-none block w-full bg-grey-lighter text-grey-darkest border border-grey-light rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-teal">
                    </div>
                </div>

                <div class="block uppercase tracking-wide text-teal-dark text-xl font-bold mb-2 mt-8">Address Info</div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="address1">
                            Address 1
                        </label>
                        <input name="address1" v-model="resident.address1" type="text" maxlength="100" placeholder="200 Woodstock Lane" class="appearance-none block w-full bg-grey-lighter text-grey-darkest border border-grey-light rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-teal">
                        <p class="hidden text-red text-xs italic"></p>
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="address2">
                            Address 2
                        </label>
                        <input name="address2" v-model="resident.address2" type="text" maxlength="100" placeholder="Unit 3F" class="appearance-none block w-full bg-grey-lighter text-grey-darkest border border-grey-light rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-teal">
                        <p class="hidden text-red text-xs italic"></p>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2" for="city">
                            City
                        </label>
                        <input name="city" v-model="resident.city" type="text" maxlength="50" placeholder="Albuquerque" class="appearance-none block w-full bg-grey-lighter text-grey-darkest border border-grey-light rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-teal">
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2" for="state">
                            State
                        </label>
                        <div class="relative">
                            <select name="state" v-model="resident.state" class="block appearance-none w-full bg-grey-lighter border border-grey-light text-grey-darkest py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-teal">
                                <option>Select one...</option>
                                <option v-for="(stateName, stateAbbr) in states" :value="stateAbbr">{{stateName}}</option>
                            </select>
                            <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darkest">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2" for="zip">
                            Zip
                        </label>
                        <input name="zip" v-model="resident.zip" type="text" placeholder="90210" maxlength="18" class="appearance-none block w-full bg-grey-lighter text-grey-darkest border border-grey-light rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-teal">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2" for="phone">
                            Phone Number
                        </label>
                        <input name="phone" v-model="resident.phone" type="tel" placeholder="757-867-5309" maxlength="18" class="appearance-none block w-full bg-grey-lighter text-grey-darkest border border-grey-light rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-teal">
                    </div>
                </div>

                <div v-if="this.resident.bed">
                    <div class="w-full flex flex-wrap mb-6 justify-between mb-2 mt-8">
                        <div class="flex-1 uppercase tracking-wide text-teal-dark text-xl font-bold">
                            Housing Info
                        </div>
                        <div @click="removeHousing" class="flex-shrink float-right mb-3 text-lg text-grey cursor-pointer hover:text-grey-dark hover:underline">
                            Remove housing assignment?
                        </div>
                    </div>
                    <div class="w-full flex flex-wrap mb-6">
                        <div class="flex-1 mb-6">
                            <label class="w-full uppercase tracking-wide text-grey-darkest text-sm font-bold mb-2" for="building">
                                Building
                            </label>
                            <div class="w-full flex">
                                <div class="flex-initial">
                                    <label class="w-full uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2" for="building_name">
                                        Name
                                    </label>
                                    <span class="text-xl text-grey-darkest">{{this.resident.bed.room.unit.building.name}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 mb-6">
                            <label class="w-full uppercase tracking-wide text-grey-darkest text-sm font-bold mb-2" for="unit">
                                Unit
                            </label>
                            <div class="w-full flex">
                                <div class="flex-initial">
                                    <label class="w-full uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2" for="unit_floor">
                                        Floor
                                    </label>
                                    <span class="text-xl text-grey-darkest">{{this.resident.bed.room.unit.floor}}</span>
                                </div>
                                <div class="flex-initial">
                                    <label class="w-full uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2" for="unit_number">
                                        Number
                                    </label>
                                    <span class="text-xl text-grey-darkest">{{this.resident.bed.room.unit.id}}</span>
                                </div>
                            </div>

                        </div>
                        <div class="flex-1 mb-6">
                            <label class="w-full uppercase tracking-wide text-grey-darkest text-sm font-bold mb-2" for="room">
                                Room
                            </label>
                            <div class="w-full flex">
                                <div class="flex-initial">
                                    <label class="w-full uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2" for="unit_floor">
                                        Number
                                    </label>
                                    <span class="text-xl text-grey-darkest">{{this.resident.bed.room.number}}</span>
                                </div>
                                <div class="flex-initial">
                                    <label class="w-full uppercase tracking-wide text-grey-darkest text-xs font-bold mb-2" for="unit_number">
                                        Bed
                                    </label>
                                    <span class="text-xl text-grey-darkest">{{this.resident.bed.number}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="block float-right mb-16">
                    <button type="submit" class="float-right bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 mb-6 rounded uppercase">Save</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                resident: Vue.util.extend({}, this.residentBefore),
                loading: false,
                msg: ''
            }
        },

        props: {
            'states': {
                'type': Object
            },
            'residentBefore': {
                'type': Object,
                'default': {
                    first_name: 'this.resident.first_name',
                    last_name: 'this.resident.last_name',
                    gender: 'this.resident.gender',
                    birth_date: 'this.resident.birth_date',
                    student_id: 'this.resident.student_id',
                    address1: 'this.resident.address1',
                    address2: 'this.resident.address2',
                    city: 'this.resident.city',
                    state: 'this.resident.state',
                    zip: 'this.resident.zip',
                    phone: 'this.resident.phone',
                },
            },
        },

        methods: {
            submitForm() {
                self = this
                this.loading = true
                axios.patch('/api/residents/' + this.resident.id, {
                    first_name: this.resident.first_name,
                    last_name: this.resident.last_name,
                    gender: this.resident.gender,
                    birth_date: this.resident.birth_date,
                    student_id: this.resident.student_id,
                    address1: this.resident.address1,
                    address2: this.resident.address2,
                    city: this.resident.city,
                    state: this.resident.state,
                    zip: this.resident.zip,
                    phone: this.resident.phone,
                }).then(response => {
                    self.loading = false
                    self.resident = response.data.data
                    self.msg = response.data.msg
                    setTimeout(function () {
                        self.msg = ''
                    }, 1000)
                }).catch(error => {
                    this.loading = false
                    console.log(error)
                })
            },

            removeHousing() {
                if (this.unsavedChanges(this.resident, this.residentBefore)) {
                    let confirmation = confirm('You have unsaved changes which will be lost if you do not save them first. Continue?')

                    if (!confirmation) {
                        return;
                    }
                }


                this.loading = true

                self = this

                axios.patch('/api/beds/' + self.resident.bed.id, {
                    remove_resident: true,
                }).then(response => {
                    self.resident.bed = null
                    self.loading = false
                    self.msg = response.data.msg
                    setTimeout(function () {
                        self.msg = ''
                    }, 1000)

                }).catch(error => {
                    self.loading = false
                    console.log(error)
                })

            },

            unsavedChanges(current, original) {
                let fieldsToCheck = [
                    'first_name',
                    'last_name',
                    'birth_date',
                    'student_id',
                    'student_id',
                    'address1',
                    'address2',
                    'city',
                    'state',
                    'zip',
                    'phone',
                ]

                return fieldsToCheck.find(function(fieldName) {
                    return (current[fieldName] != original[fieldName])
                });
            },
        },
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
