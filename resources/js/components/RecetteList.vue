<template>
    <div>
        <RecipeListItem v-for="task in tasks" :key="task.description">{{ task.description }}</RecipeListItem>
    </div>
</template>
<script>
import RecipeListItem from './RecipeListItem';

export default {
    name: 'RecipeList',
    components: {
            RecipeListItem
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
