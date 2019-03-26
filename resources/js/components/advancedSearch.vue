<template>
    <div class="col-8 col-sm-12 col-md-3 col-lg-3 offset-lg-3">
        <div v-if="!isOn" class="search-box mt-5">
            <a @click="toggle" href="/#">Advanced Search</a>
            <form>
                <input id="search" name="search" type="text" placeholder="Search...">
                <button class="usa-button leaf-btn search-btn"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div v-if="isOn" id="advSearch">
        </div>
    </div>
</template>

<script>
    export default {
        name: "advancedSearch",
        data() {
            return {
                isOn: false
            }
        },
        methods: {
            toggle() {
                this.isOn = !this.isOn
            }
        }
    }
</script>

<style scoped>
    #advSearch{
        border: solid 1px lightgray;
        background-color: #F5F5F5
    }
</style>
