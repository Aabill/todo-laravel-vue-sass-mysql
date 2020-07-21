<template>
    <div class="todos">
        <div class="todo" v-for="todo in allTodos" :key="todo.id">
            <div @click="checkTodo(todo)" :class="todo.completed ? 'completed': ''" class="check"><f-a-i :icon="['fas','check']"/></div>
            <span v-text="todo.title"></span>
            <div class="delete" @click='rmTodo(todo.id)'><f-a-i :icon="['fas', 'trash']" /></div>
        </div>
        
    </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
export default {
    name: 'todos',
    methods: {
        ...mapActions(['fetchTodos']),
        ...mapActions(['removeTodo']),
        ...mapActions(['completeTodo']),
        rmTodo(id) {
            this.removeTodo(id);
        },
        checkTodo(todo) {
            this.completeTodo(todo);
        }
    },
    computed: {
        ...mapGetters(['allTodos'])
    },
    created() {
        this.fetchTodos();
    }
}
</script>

<style lang="scss" scoped>
@use '../../sass/use/variables';
@use '../../sass/use/mixins';
.todos {
    margin: 20px auto 20px auto;
    width: 90vw;
    @media only screen and(min-width: 768px){
        width: 70vw;
    }
    @media only screen and(min-width: 1280px) {
        width: 50vw;
    }
    .todo {
        margin: 10px;
        display:grid;
        grid-template-columns: 10% auto 10%;
        width: auto;
        box-shadow: 0 0.5px 5px 0.5px variables.$dark_gray;
        div{
            @include mixins.flex-just-align;
            cursor: pointer;
            transition: all 0.2s ease-out;
            svg {
                transition: all 0.2s ease-out;
            }
            &.delete:hover {
                box-shadow: -1px 0 5px -1px variables.$dark_gray;
                color: variables.$red;
                svg {
                    width: 20px;
                    height: 20px;
                }
            }
            &.check:hover {
                box-shadow: 1px 0 5px -1px variables.$dark_gray;
                color: variables.$checkBtn;
                svg {
                    width: 20px;
                    height: 20px;
                }
            }
            &.check.completed {
                color: variables.$checkBtn;
                &:hover {
                    color: variables.$text_light;
                }
                ~span {
                    text-decoration: line-through;
                    opacity: 0.5;
                    color: variables.$checkBtn; 
                }
            }
        }
        span{
            margin: 10px;   
            transition: all 0.2s linear;
        }
    }
}
</style>