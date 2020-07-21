<template>
    <div id="app">
        <toolbar />
        <addtodo />
        <todos />
    </div>
</template>

<script>
import toolbar from './components/toolbar.vue';
import todos from './components/todos.vue';
import addtodo from './components/addtodo.vue';
export default {
    name: 'App',
    components: {
        toolbar,
        todos,
        addtodo
    }
}
</script>