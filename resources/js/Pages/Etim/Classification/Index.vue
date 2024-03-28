<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import EtimStats from '@/Components/EtimStats.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Etim</h2>
        </template>

        <div class="py-12">
            <div class="max-w-xl mx-auto sm:p-6 lg:p-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-6 text-gray-900 text-center"><Link href="/admin">View ETIM Model</Link></div>

                </div>
            </div>
            <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <!-- <div class="p-6 text-gray-900 text-center"><Link href="/etim/update">Model Update via API</Link></div> -->

                </div>
            </div>                        
        </div>

        <EtimStats class="" v-bind="etimStats"/>


    </AuthenticatedLayout>
</template>

<script>
export default {
    components : {
        EtimStats
    },

  props: {
    etimStats: Object
  }
}
</script>