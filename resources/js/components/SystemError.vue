<template>
    <div v-if="systemErrors" class="card bg-danger mb-3">
        <div class="card-body">
            <h3 class="text-white">
                {{systemErrors}}
                <span class="float-right" @click="clearSystemError">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </span>
            </h3>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
    name: "SystemError",
    computed: mapGetters(["systemErrors"]),
    methods: mapActions(["clearSystemError"])
};
</script>

<style>
</style>