<template>
    <div class="todolistContainer">
        <div class="heading">
            <h2 id="title">My Todo List</h2>
            <add-item-form />
        </div>
    </div>
</template>

<script>
import addItemFormVue from './addItemForm.vue'
import listViewVue from './listView.vue'
export default {
    components: {
        addItemFormVue,
        listViewVue
    }
}
</script>

<style scoped>
.todolistContainer {
    width:350px;
    margin: auto;
}

.heading {
    background: gray;
    padding: 10px;
}

#title {
    text-align:center;
}
</style>