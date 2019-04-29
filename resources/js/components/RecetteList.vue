<template>
    <div>
        <RecetteListItem v-for="task in tasks" :key="task.description">{{ task.description }}</RecetteListItem>
    </div>
</template>
<script>
import RecetteListItem from './RecetteListItem';

export default {
    name: 'RecetteList',
    components: {
            RecetteListItem
        },
    data() {
        return {
            tasks: [
                { description: 'Go to the store', complete: true },
                { description: 'Afficher la liste', complete: false },
                { description: 'Terminer le programme', complete: false }
            ]
        };
    }
}
</script>
