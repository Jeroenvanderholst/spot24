<template>
                <div class="px-3 py-6 bg-white">
                <h2 class="mx-3 mb-3 text-2xl">Stats</h2>
                <dl class="mx-3 grid grid-cols-3 text-lg">
                    <dt class="col-span-2 pb-1">Groups: </dt><dl class="text-right">{{groupCount}}</dl>
                    <dt class="col-span-2 pb-1">Product classes: </dt><dl class="text-right">{{productClassCount}}</dl>
                    <dt class="col-span-2 pb-1">Modelling classes: </dt><dl class="text-right">{{modellingClassCount}}</dl>
                    <dt class="col-span-2 pb-1">Features: </dt><dl class="text-right">{{featureCount}}</dl>
                    <dt class="col-span-2 pb-1">Values: </dt><dl class="text-right">{{valueCount}}</dl>
                    <dt class="col-span-2 pb-1">Units: </dt><dl class="text-right">{{unitCount}}</dl>                 
                    <dt class="col-span-2 pb-1">Translations: </dt><dl class="text-right">{{translationCount}}</dl>                 
                    <dt class="col-span-2 pb-1">Synonyms: </dt><dl class="text-right">{{synonymCount}}</dl>                 
                </dl>

            </div>
</template>

<script>
    export default {
    
    props: {
        unitCount: Number,
        valueCount: Number,
        featureCount: Number,
        productClassCount: Number,
        groupCount: Number,
        modellingClassCount: Number,
        translationCount: Number,
        synonymCount: Number,
        },

          
    }
</script>